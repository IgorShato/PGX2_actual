<?php 

try{
	header('Content-type: application/pdf');

	$values = array();
	parse_str($_POST['formData'], $values);

	// данные пациента
	$InputId = $values['InputId'];
	$InputSurname = $values['InputSurname'];
	$InputFirstName = $values['InputFirstName'];
	$InputSecondName = $values['InputSecondName'];
	$InputBirth = $values['InputBirth'];
	$InputHeight = $values['InputHeight'];
	$InputWeight = $values['InputWeight'];
	$InputSex = $values['InputSex'];
	$InputRase = $values['InputRase'];
	$InputDate = $values['InputDate'];
	$InputNameDoctor = $values['InputNameDoctor'];

	if (isset($_POST['columns'])){
		$firstStepColumns = $_POST['columns'];
	}

	if (isset($_POST['drugs'])){
		$secondStepColumns = $_POST['drugs'];
	}

	if (isset($_POST['kPolSum'])){
		$kPolSumColumns = $_POST['kPolSum'];
	}

	if (isset($_POST['dynamicText'])){
		$dynamicText = $_POST['dynamicText'];
	}
	

	//подключаем библиотеку
	include('library/tcpdf.php'); 

	//создаем объект 
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

		
	//шрифты
	//$pdf->SetFont('Helvetica', '', 19);
	//$pdf->SetFont('dejavusans', '', 14, '', true); // безопасный
	$pdf->SetFont('Arsenal', '', 16, '', true); 
	//$pdf->SetFont('firasanscondensed', '', 16, '', true); 
	//$pdf->SetFont('alegreyasansi', '', 16, '', true);

		
	//отключаем хедер и футер 
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);

	//обрыв страницы
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


	//страница 1 
	$pdf->AddPage('P', 'A4');
			
	//вертикальная позиция для колонки
	$y = $pdf->getY();
	
	//цвет для левой колонки
	$pdf->SetFillColor(75, 120, 114);

	$left_column = '';

	//левая колонка
	$pdf->writeHTMLCell(40, '295', '1', '1', $left_column, 0, 0, 1, true, 'J', true);

	//цвет для текста 
	//$pdf->SetTextColor();

	//главный заголовок
	$title = '
	<div><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PharmacoGenomeX<sub>2</sub></h1></div>
	<style>
	h1 {
		color: #FFFFFF;
		font-size: 26px;
	}
	</style>
	';

	//блоки справа 
	$pdf->WriteHTMLCell(170, 48, '88', '0', "", 1,0); //блок 1
	$pdf->WriteHTMLCell(120, 33, '101', '1', "$title", 0,0, 'J', true); //блок 2

	//текст интро
	$text_intro = '<h4>Результаты генотипирования<br> и рекомендации<br> по персонализированной терапии</h4>
	<style>
	h4 {
		color: #4B7872;
		text-align: right;
		font-size: 16px;
	}
	</style>
	';

	//вывод контента
	$pdf->WriteHTMLCell(120, 30, '80', '55', "$text_intro", 0,0);

	//картинка
	$pdf->Image('web_medium.png', 45, 75, 180, 120, 'PNG', '', '', true, 150, '', false, false, 1, false, false, false);

	//таблица данных пациента
	$table1 = <<<EOD
	<table>
	<tr>
	<td><strong>Фамилия</strong></td>
	<td>$InputSurname</td>
	<td><strong>ID</strong></td>
	<td>$InputId</td>
	</tr>
	<tr>
	<td>Имя</td>
	<td>$InputFirstName</td>
	<td>Дата рождения</td>
	<td>$InputBirth</td>
	</tr>
	<tr>
	<td>Отчество</td>
	<td>$InputSecondName</td>
	<td>Пол</td>
	<td>$InputSex</td>
	</tr>
	<tr>
	<td>Вес</td>
	<td>$InputWeight</td>
	<td>Раса</td>
	<td>$InputRase</td>
	</tr>
	<tr>
	<td>Рост</td>
	<td>$InputHeight</td>
	<td>Дата</td>
	<td>$InputDate</td>
	</tr>
	</table>

	<style>
	table {
		font-size: 11px;
	}
	</style>
	EOD;

	//вывод данных
	$pdf->WriteHTMLCell(140, 24, '43', '210', "$table1", 1,0);

	//электронная подпись 
	$sign = '<p><strong>Электронная подпись</strong></p>
	<p>'.$InputNameDoctor.'</p>
	<style>
		p {
		color: #000000;
		text-align: right;
		font-size: 11px;
	}
	</style>
	';

	// вывод подписи 
	$pdf->WriteHTMLCell(140, 20, '60', '259', "$sign", 0,0);



	//страница 2
	$pdf->AddPage('P', 'A4');

	//вертикальная позиция для столбца
	$y = $pdf->getY();

	//левая колонка
	//цвет фона
	$pdf->SetFillColor(75, 120, 114);

	//вывод колонки
	$pdf->writeHTMLCell(21, '295', '1', '1', $left_column, 0, 0, 1, true, 'J', true);

	//вертикальный текст - начало
	$pdf->StartTransform();
	// Rotate of degrees
	$pdf->Rotate(90, 58, 145);
	$pdf->SetDrawColor(255);
	$pdf->SetTextColor(255);
	$pdf->Text(40, 95, "РЕЗУЛЬТАТЫ  ГЕНОТИПИРОВАНИЯ");

	//вертикальный текст - конец
	$pdf->StopTransform();

	//цвет текста
	$pdf->SetTextColor(0);


	$tableGenesRow = '';
	if (isset($_POST['columns'])){

		foreach($firstStepColumns as $key => $column){
			$tableGenesRow .= 
			'<tr>
				<td style="color: #FFFFFF; background-color: #5DACA1;">'.$column[0].'</td>
				<td>'.$column[1].'</td>
				<td>'.$column[2].'</td>
				<td>'.$column[3].'</td>
				<td>'.$column[4].'</td>
				<td>'.$column[5].'</td>
			</tr>';
		}
	}

	//таблица генов
	$table_genes = '
	<table>
	<tr>
	<th>ГЕН</th>
	<th>ПОЛИМОРФИЗМ</th>
	<th>АЛЛЕЛЬ</th>
	<th>RS</th>
	<th>ГЕНОТИП</th>
	<th>АКТИВНОСТЬ</th>
	</tr>
	'.$tableGenesRow.'
	</table>

	<style>
	th {
		font-size: 10px;
		color: #FFFFFF;
		background-color: #4B7872;
		text-align: center;
		width: 85px;
		height: 18px;
	}
	td {
		font-size: 10px;
		text-align: center;
	}
	</style>
	';
    
	//вывод таблицы
	$pdf->WriteHTMLCell(165, '', '25', '10', "$table_genes", 0,0);


//страница 3
$pdf->AddPage('P', 'A4');

//вертикальная позиция для столбца
$y = $pdf->getY();

//левая колонка
//цвет фона
$pdf->SetFillColor(75, 120, 114);

//вывод колонки
$pdf->writeHTMLCell(21, '295', '1', '1', $left_column, 0, 0, 1, true, 'J', true);

//вертикальный текст - начало
$pdf->StartTransform();
// Rotate of degrees
$pdf->Rotate(90, 58, 145);
$pdf->SetDrawColor(255);
$pdf->SetTextColor(255);
$pdf->Text(40, 95, "ЗАКЛЮЧЕНИЕ");

//вертикальный текст - конец
$pdf->StopTransform();

//цвет текста
$pdf->SetTextColor(0);


	$dynamicTextOutput = '';

	
	if (!empty($dynamicText['dynamicDrugGroups'])){
		$dynamicDrugGroups = '';
		$dynamicDrugGroups1 = '';
		$dynamicDrugGroups2 = '';

		if (!empty($dynamicText['dynamicDrugGroups'])){
			$dynamicDrugGroups1 = 'фармакокинетике';
			$dynamicDrugGroups2 = implode(", ", $dynamicText['dynamicDrugGroups']);
		}
        
		$dynamicTextOutput = '
			<p>Имеются данные, свидетельствующие о наличии генетически обусловленных изменениях в '.$dynamicDrugGroups1.', что может оказывать влияние на эффективность и безопасность терапии таких групп лекарств, как '.$dynamicDrugGroups2.'. </p>
			<p>Рекомендации по коррекции дозы данных лекарств изложены в прилагаемых таблицах. Некоторые лекарства не рекомендуются к назначению, так как имеют крайне высокий риск развития нежелательных реакций или выраженный недостаточной эффективности у данного пациента.</p>
			<p>Суточная доза лекарства после коррекции не должна выходить за рамки интервала дозы, указанной в инструкции к лекарству.</p>
		';
	}else{
		$dynamicTextOutput = '
			<p>Генетические изменения, способные оказать влияния на эффективность и безопасность изучаемых лекарств через изменения фармакокинетики и фармакодинамики обнаружены не были. Все лекарства можно назначать в стандартной дозе.</p>
			<p>По результатам тестирования оценено влияние на эффективность и безопасность лекарств только включенных в генетическую панель полиморфных маркеров, что снижает риск развития нежелательных реакций и фармакорезистентности. При этом нежелательные реакции и отсутствие ожидаемой эффективности терапии все равно может иметь место быть, так как на их развитие могут оказать влияние как более редко встречаемые изменения в генах, так и эпигенетические факторы (возраст, сопутствующая патология, пищевой рацион и другие).</p>
		';
	}


	//текст 
	$text_page2 = '
	<strong>Об отчете</strong>
	<p>Отчет представляет из себя электронный справочник, позволяющий быстро ориентироваться в литературе, посвященной исследованиям в области фармакогенетики и формировать рекомендации, представляющие из себя квинтэссенцию выводов соответствующих систематических обзоров, мета-анализов и исследований уровня доказательности 3 и выше по оксфордской классификации, ссылки на которые доступны по запросу.</p>
	<strong>Описание методики</strong>
	<p>Определение методом полимеразной цепной реакции в режиме реального времени на ДНК-амплификаторе «DTprime 5» компании «ДНК-Технология» (Россия). Выделение ДНК осуществляется с помощью набора реагентов “М-Сорб” для выделения геномной ДНК из клинических образцов (ЗАО «Синтол», Москва, Россия). В наборах используется два аллель-специфичных зонда, которые позволяют раздельно детектировать сразу два аллеля исследуемого полиморфизма на двух каналах флуоресценции. Результаты реакции на двух каналах позволяют однозначно определить присутствие каждого из аллелей исследуемого полиморфизма.</p>
	<p>Программа амплификации включает в себя этап инкубации при 95°C в течение 3 минут, затем денатурация при 95°C - 15 секунд и отжиг при 63°C - 40 секунд в течение 40 циклов. Сигнал флуоресценции развивается по соответствующему каналу: FAM и/или HEX.</p>

	<strong>Заключение</strong>
	'.$dynamicTextOutput.'

	<style>
		p {
		color: #000000;
		font-size: 11px;
	}
	</style>
	';
	

	// вывод текста
	$pdf->WriteHTMLCell(160, 10, '30', '20', "$text_page2", 0,0);
	$pdf->AddPage('L', 'A4');

/*
	// треугольники
	$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'phase' => 0, 'color' => array(0, 0, 0));
	$style2 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
	$style3 = array('width' => 0.5, 'cap' => 'round', 'join' => 'round', 'dash' => 0, 'color' => array(0, 0, 0));
	$style4 = array('L' => 0,
									'T' => array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '20,10', 'phase' => 10, 'color' => array(100, 100, 255)),
									'R' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 50, 127)),
									'B' => array('width' => 0.75, 'cap' => 'square', 'join' => 'miter', 'dash' => '30,10,5,10'));
	$style5 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(49, 21, 168));
	$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(0, 128, 0));
	$style7 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(168, 24, 21));


	$pdf->Line(40, 219, 40, 270, $style2); //вертикальная линия
	$pdf->Line(42, 244, 196, 244, $style3); //горизонтальная линия

	//текст
	$pdf->WriteHTMLCell(15, 10, '27', '218', "<small>200%</small>");
	$pdf->WriteHTMLCell(15, 10, '27', '230', "<small>150%</small>");
	$pdf->WriteHTMLCell(15, 10, '27', '242', "<small>100%</small>");
	$pdf->WriteHTMLCell(15, 10, '29', '254', "<small>50%</small>");
	$pdf->WriteHTMLCell(15, 10, '30', '266', "<small>0%</small>");

	//текст
	$pdf->WriteHTMLCell(30, 20, '28', '277', "<small>Активность</small>");
	$pdf->WriteHTMLCell(30, 20, '50', '277', "<small>CYP2C19*2</small>");
	$pdf->WriteHTMLCell(30, 20, '72', '277', "<small>CYP2C19*3</small>");
	$pdf->WriteHTMLCell(30, 20, '94', '277', "<small>CYP2C19*17</small>");
	$pdf->WriteHTMLCell(30, 20, '118', '277', "<small>CYP2D6*4</small>");
	$pdf->WriteHTMLCell(30, 20, '138', '277', "<small>CYP3A4*22</small>");
	$pdf->WriteHTMLCell(30, 20, '160', '277', "<small>CYP3A5*3</small>");
	$pdf->WriteHTMLCell(30, 20, '182', '277', "<small>ABCB1*6</small>");

	// треугольник вверх 
	$pdf->RegularPolygon(104, 238, 12, 3, 60, '', 'DF', $style6, array(50, 59, 159));
	// текст треугольника
	$persent_up = '
	<p>+95%</p>
	<style>
	p {
		color: #FFFFFF;
		font-size: 9px;
	}
	</style> 
	';
	$pdf->WriteHTMLCell(20, 20, '98', '235', $persent_up);

	// треугольник низ 
	$pdf->RegularPolygon(125, 250, 12, 3, 0, '', 'DF', $style6, array(168, 24, 48));
	// текст треугольника 
	$persent_down = '
	<p>-95%</p>
	<style>
	p {
		color: #FFFFFF;
		font-size: 9px;
	}
	</style>
	';
	$pdf->WriteHTMLCell(20, 20, '120', '249', $persent_down);


	//страница 3
		$pdf->AddPage('L', 'A4');
		
		//таблица
	// цвет фона
	$pdf->SetFillColor(75, 120, 114);

	// цвет текста
	//$pdf->SetTextColor(255, 255, 255);

	// хедер таблицы
	$header_table_spec = '
	<br><h4>СПЕЦИФИЧЕСКИЕ РЕКОМЕНДАЦИИ</h4>
	<style>
	h4 {
		font-size: 14px;
		text-align: center;
		color: #FFFFFF;
		font-weight: regular;
	}
	</style>
	';

	$pdf->writeHTMLCell(288, '24', '4', '4', $header_table_spec, 0, 0, 1, true, 'J', true);

	//таблица
	$table_spec = '
	<table>
	<tr>
	<th style="color: #FFFFFF; background-color: #5DACA1;">СИОЗС</th>
	<th style="color: #FFFFFF; background-color: #5DACA1;">РЕКОМЕНДАЦИИ</th>
	<th style="color: #FFFFFF; background-color: #5DACA1;">ФАРМАКО<br>ДИНАМИКА</th>
	<th style="color: #FFFFFF; background-color: #5DACA1;">ДЕЙСТВИЕ</th>
	<th style="color: #FFFFFF; background-color: #5DACA1;">ФАРМАКО<br>КИНЕТИКА</th>
	<th style="color: #FFFFFF; background-color: #5DACA1;">ДЕЙСТВИЕ</th>
	<th style="color: #FFFFFF; background-color: #5DACA1;">ПОЛИПРАГМАЗИЯ<br>И ДРУГИЕ ФАКТОРЫ</th>
	</tr>
	<tr>
	<td style="color: #4B7872">Серталин<br>Золофт&reg;</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	<tr>
	<td style="color: #4B7872">Флувоксамин<br>Феварин&reg;</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	<tr>
	<td style="color: #4B7872">Флуоксетин<br>Прозак&reg;</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	<tr>
	<td style="color: #4B7872">Циталопрам<br>Ципрамил&reg;</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	<tr>
	<td style="color: #4B7872">Эскиталопрам<br>Ципралек&reg;</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	</table>

	<style>
	th {
		font-size: 11.5px;
		color: #FFFFFF;
		background-color: #4B7872;
		text-align: center;
		border: solid 1px #FFFFFF;
	}
	td {
		font-size: 10px;
		text-align: center;
		font-weight: bold;
		color: #000000;
		border: solid 1px #A5C5C1;
		height: 40px;
	}
	</style>
	';

	//вывод таблицы
	$pdf->WriteHTMLCell(290, 15, '3', '30', "$table_spec", 0, 0);
	*/

	//страница 4
		//$pdf->AddPage('L', 'A4');
		
		//таблица
	//цвет фона
	//$pdf->SetFillColor(75, 120, 114);

	// цвет текста
	//$pdf->SetTextColor(255, 255, 255);

	// $tableDrugsRow = '';
	// if (isset($_POST['drugs'])){
	
	// 	foreach($secondStepColumns as $key => $column){
	// 		$tableDrugsRow .= 
	// 		'<tr>
	// 			<td style="color: #4B7872">'.$column['name'].'</td>
	// 			<td>'.$column['geneSum'].'</td>
	// 			<td></td>
	// 			<td></td>
	// 			<td></td>
	// 			<td></td>
	// 			<td></td>
	// 		</tr>';
	// 	}
	// }

	if (isset($_POST['drugs'])){
	
		foreach($secondStepColumns as $key => $column){
			$header_table_extended = '
			<br><h4>'.$column['drugGroup'].'</h4>
			<style>
			h4 {
				font-size: 14px;
				text-align: center;
				color: #FFFFFF;
				font-weight: regular;
			}
			</style>
			';

			$pdf->writeHTMLCell(288, '24', '4', '4', $header_table_extended, 0, 0, 1, true, 'J', true);
			$x = 3;
			$y = 0;
			$end_y = 0;
			$table_extended = '
				<style>
					th {
						font-size: 11.5px;
						color: #FFFFFF;
						background-color: #4B7872;
						text-align: center;
						border: solid 1px #FFFFFF;
					}
					td {
						font-size: 10px;
						text-align: center;
						font-weight: bold;
						color: #000000;
						border: solid 1px #A5C5C1;
						height: 20px;
					}
				</style>

				<table>
					<tr nobr="true">
						<th style="color: #FFFFFF; background-color: #5DACA1;">ЛЕКАРСТВО</th>
						<th style="color: #FFFFFF; background-color: #5DACA1;">РЕКОМЕНДАЦИИ</th>
						<th style="color: #FFFFFF; background-color: #5DACA1;">ФАРМАКО<br>ДИНАМИКА</th>
						<th style="color: #FFFFFF; background-color: #5DACA1;">ДЕЙСТВИЕ</th>
						<th style="color: #FFFFFF; background-color: #5DACA1;">ФАРМАКО<br>КИНЕТИКА</th>
						<th style="color: #FFFFFF; background-color: #5DACA1;">ДЕЙСТВИЕ</th>
						<th style="color: #FFFFFF; background-color: #5DACA1;">ПОЛИПРАГМАЗИЯ<br>И ДРУГИЕ ФАКТОРЫ</th>
					</tr>
			';
			foreach($column['categories'] as $key2 => $category){
				$categorieName = $category['catName'];
				$tableDrugsRow = '';
				foreach($category['drugs'] as $key3 => $drug){
					$tableDrugsRow .= 
					'<tr nobr="true">
						<td style="color: #4B7872">'.$drug['name'].'</td>
						<td style="font-weight: regular">'.$drug['geneSum'].'</td>
						<td style="font-weight: regular">'.$drug['pharmGene'].'</td>
						<td style="font-weight: regular">'.$drug['fdAction'].'</td>
						<td style="font-weight: regular">'.$drug['enzyme'].'</td>
						<td style="font-weight: regular">'.$drug['fcAction'].'</td>
						<td></td>
					</tr>';
				}

				//таблица
				$table_extended .= '
					<tr>
						<th colspan="7" style="text-align: center; background-color: #4B7872; color: #FFFFFF;">'.$categorieName.'</th>
					</tr>
					'.$tableDrugsRow.'
				';
			}

			$table_extended .= '
				</table>
			';
			//вывод таблицы
			$pdf->WriteHTMLCell(290, 15, '3', '30', "$table_extended", 0, 0); 
			$curPageNum = $pdf->getNumPages();
			for ($i = $pdf->getPage(); $i <= $curPageNum; $i++){
				$pdf->AddPage('L', 'A4');
			}
			
		}
	}

	// 	//страница 5
	// 	$pdf->AddPage('L', 'A4');
		
	// 	//таблица
	// //цвет фона
	// $pdf->SetFillColor(75, 120, 114);

	// // цвет текста
	// //$pdf->SetTextColor(255, 255, 255);

	// $tableKPolSumRow = '';
	// if (isset($_POST['kPolSum'])){
		

	// 	foreach($kPolSumColumns as $key => $column){
	// 		$tableKPolSumRow .= 
	// 		'<tr>
	// 			<td>'.$column['gen'].'</td>
	// 			<td>'.$column['kPolSum'].'</td>
	// 			<td></td>
	// 			<td></td>
	// 			<td></td>
	// 			<td></td>
	// 			<td></td>
	// 		</tr>';
	// 	}
	// }

	// // хедер таблицы
	// $header_table_newName = '
	// <br><h4>РАСШИРЕННЫЕ РЕКОМЕНДАЦИИ</h4>
	// <style>
	// h4 {
	// 	font-size: 14px;
	// 	text-align: center;
	// 	color: #FFFFFF;
	// 	font-weight: regular;
	// }
	// </style>
	// ';

	// $pdf->writeHTMLCell(288, '24', '4', '4', $header_table_newName, 0, 0, 1, true, 'J', true);


	// //таблица
	// $table_newName = '
	// <table>
	// 	<tr>
	// 	<th style="color: #FFFFFF; background-color: #5DACA1;">СИОЗС</th>
	// 	<th style="color: #FFFFFF; background-color: #5DACA1;">РЕКОМЕНДАЦИИ</th>
	// 	<th style="color: #FFFFFF; background-color: #5DACA1;">ФАРМАКО<br>ДИНАМИКА</th>
	// 	<th style="color: #FFFFFF; background-color: #5DACA1;">ДЕЙСТВИЕ</th>
	// 	<th style="color: #FFFFFF; background-color: #5DACA1;">ФАРМАКО<br>КИНЕТИКА</th>
	// 	<th style="color: #FFFFFF; background-color: #5DACA1;">ДЕЙСТВИЕ</th>
	// 	<th style="color: #FFFFFF; background-color: #5DACA1;">ПОЛИПРАГМАЗИЯ<br>И ДРУГИЕ ФАКТОРЫ</th>
	// 	</tr>
	// 	'.$tableKPolSumRow.'
	// </table>

	// <style>
	// th {
	// 	font-size: 11.5px;
	// 	color: #FFFFFF;
	// 	background-color: #4B7872;
	// 	text-align: center;
	// 	border: solid 1px #FFFFFF;
	// }
	// td {
	// 	font-size: 10px;
	// 	text-align: center;
	// 	font-weight: bold;
	// 	color: #000000;
	// 	border: solid 1px #A5C5C1;
	// 	height: 40px;
	// }
	// </style>
	// ';

	// //вывод таблицы
	//$pdf->WriteHTMLCell(290, 15, '3', '30', "$table_newName", 0, 0); 
	$pdf->Output('PharmacoGenomeX2 - Report.pdf', 'I');
	

	//вывод данных
	return $pdf;
	

}catch (PDOExeption $e){
	return $e->getMessage;
}
 

