<h1><?=$test?></h1>
<form method="POST" name="create-report">
    <select name="type" >
        <option>Тип отчета</option>
        <option value="screen">Печать на экран</option>
        <option value="csv">Печать на экран в csv</option>
    </select>

    <button type="submit">Сформировать отчет</button>
</form>