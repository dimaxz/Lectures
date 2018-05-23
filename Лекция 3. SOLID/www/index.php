<?php
//1. Формирование отчета по заказам
//Пользователь имеет возможность нажать кнопку "Сформировать отчет"
//
//2. Отображение отчета на экране.
//Пользователь имеет возможность выбрать в выпадающем списке формат отчета "Вывести на экране".
//Пользователь - актер
//Отчет по заказу
//Reporter
//Reporter\ReportInterface
//ReportCreater
//
//Reporter\ReportHtml
//Reporter\ReportCsv

include 'reportAbstract.php';
include 'reportConcrete.php';

$data = [
    [
        "id"       => 1,
        "date"     => "2017-06-19 15:30",
        "summ"     => 120.50,
        "count"    => 10,
        "currency" => "руб"
    ],
    [
        "id"       => 2,
        "date"     => "2016-06-19 15:30",
        "summ"     => 110.50,
        "count"    => 10,
        "currency" => "руб"
    ],
    [
        "id"       => 3,
        "date"     => "2017-08-19 15:30",
        "summ"     => 20.50,
        "count"    => 3,
        "currency" => "руб"
    ]
];




switch (TRUE) {
    case $_POST["type"] == "screen":
        
        $driver = new ReportHtml();

        break;

    case $_POST["type"] == "csv":
        
        $driver = new ReportCsv();

        break;    
    
    default:
        
        $driver = new ReportEmpty;
        
        break;
}


if (isset($_POST["type"])) {

    $report = new ReportCreater($driver);
    
    foreach ($data as $row){
        $order = new Order(
                $row["id"],
                $row["summ"],
                $row["currency"],
                $row["date"],
                $row["count"]
                );
        $report->addOrder($order);
    }
    
    echo $report->process();
    
} else {
    
    include 'view.php';

}

