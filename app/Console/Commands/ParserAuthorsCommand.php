<?php

namespace App\Console\Commands;

require_once __DIR__ . '/../../../vendor/autoload.php';


use App\Models\AuthorModel;
use Symfony\Component\DomCrawler\Crawler;

class parserAuthorsCommand extends BooksCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:parserAuthors {pages}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'parsing';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        for ($i = 0; $i < $this->argument('pages'); $i++) {
            $url = "https://book24.ua/authors/?PAGEN_1=$this->start;";

            $this->info($url);

            $html = file_get_contents($url);

            $crawler = new Crawler($html);

            // parsing Images
            $crawler = $crawler->filter('div.vendors-section-list > div > div > a > span > span.image > img')
                ->each(function (Crawler $node) {
                    return $node->attr('src');
                });

            foreach ($crawler as $item) {

                $crawlerName = explode('/', $item);

                $getName = storage_path() . '/images/' . array_pop($crawlerName);

                $crawlerUrl = self::URL . $item;

                file_put_contents($getName, file_get_contents($crawlerUrl));
            }

            $this->info("parser images from page: $this->start finished");

            // parsing Authors
            if ($this->start <= $this->argument('pages')) {
                $crawler = new Crawler($html);
                $crawler = $crawler->filter('span.item > span.item-title')
                    ->each(function (Crawler $node) {
                        return $node->text();
                    });

                $this->start++;

                foreach ($crawler as $author) {
                    $addAuthors = new AuthorModel();

                    $fullName = explode(' ', $author);

                    $addAuthors->name = $fullName[0];
                    $addAuthors->surname = $fullName[1] ?? null;
                    $addAuthors->patronymic = $fullName[2] ?? null;

                    $addAuthors->save();
                }
            }

            $this->info("parser authors and save to DB::table('authors') from page: $this->start finished");

        }

        $this->info('finished parser');
    }
}
