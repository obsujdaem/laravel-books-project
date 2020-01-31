<?php

namespace App\Console\Commands;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;

class parserBooksCommand extends BooksCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:parserBooks {pages}';

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
        //крутим столько страниц, сколько получили от command: {pages}
        for ($i = 0; $i < $this->argument('pages'); $i++) {
            $url = "/authors/?PAGEN_1=$this->start;";
            $html = file_get_contents(self::URL . $url);

            $crawler = new Crawler($html);

            //получаем всех авторов страницы
            $crawler = $crawler
                ->filter('div.vendors-section-list > div > div > a')
                ->each(function (Crawler $node) {
                    return $node->attr('href');
                });

            // получаем url каждого автора
            foreach ($crawler as $url) {
                $urlBooks = self::URL . $url . '?PAGEN_2=' . "$this->start";

                $this->secret($urlBooks); // https://book24.ua/authors/{author_name}/?PAGEN_2=1:

                $html = file_get_contents($urlBooks);

                $crawler = new Crawler($html);


                //получаем название книг автора + цену
                $crawler = $crawler
                    ->filter('#catalog > div.catalog-item-table-view > div > div')
                    ->each(function (Crawler $cost) {
                        return [
                            $cost->filter('div > div.item-all-title > a > span')->text(),
                            $cost->filter('div.item-price-cont > div > span')->text()
                        ];
                    });

                dump($crawler);

                // проверка на наличие второй страницы книг автора
                $crawler = new Crawler($html);

                $this->paginator++;

                $href = $url . '?PAGEN_2=' . $this->paginator; // /authors/{author_name}/?PAGEN_2=2:

                $crawler = $crawler
                    ->filter('#catalog > div.pagination')
                    ->evaluate("count(//*[@id='catalog']/div[2]/ul/li/a[@href='$href'])"); // [] / [1]

                if ($crawler && $crawler[0] > 0) {

                    $crawler = new Crawler($html); // возвращает количество страниц
                    $crawler = $crawler
                        ->filter('#catalog > div.pagination > ul > li.last')->previousAll()->text();

                    for ($i = 2; $i - 1 < $crawler; $i++) {
                        $this->info("parsing $i page");

                        $html = file_get_contents(self::URL . "$url" . '?PAGEN_2=' . "$i");

                        $crawlerSecondPage = new Crawler($html);

                        //получаем название книг автора + цену на новой странице автора
                        $crawlerSecondPage = $crawlerSecondPage
                            ->filter('#catalog > div.catalog-item-table-view > div > div')
                            ->each(function (Crawler $cost) {
                                return [
                                    $cost->filter('div > div.item-all-title > a > span')->text(),
                                    $cost->filter('div.item-price-cont > div > span')->text()
                                ];
                            });

                        dump($crawlerSecondPage);
                    }

                    $this->error("with this $url that's all");
                    $this->paginator = 1;

                } else {
                    $this->error('only 1 page');
                    $this->paginator = 1;
                }
            }
        }
    }
}
