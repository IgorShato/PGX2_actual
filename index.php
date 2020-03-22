<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<title>PharmacoGenomeX2 - форма</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="">
</head>

<body>
    <?php include './config.php'; ?>
	<!-- форма -->
	<!-- шаг 1 -->

	<form action="" id="php/" method="POST"></form>

	<section class="" id="">
		<br>
		<div class="container">
			<h2>/Шаг 1</h2>
			<h2>Insert the Data</h2>
			<p>Do not change the genotype, if you don’t know it ("wild" types is default).</p><br>

			<!-- выбираем направление  -->

			<div class="row">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<?php
						$statement = $pdo->prepare("SELECT * FROM category");
						$statement->execute();
						$data = $statement->fetchAll(PDO::FETCH_ASSOC);

						foreach($data as $key => $value):
							//var_dump($value);
							?>
							<a class="nav-link <?php if ($key == 0){echo 'active';} ?>" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
								role="tab" aria-controls="v-pills-home" aria-selected="true" data-category-id="<?php echo $value['idCategory']; ?>"><?php echo $value['name']; ?> &rarr;</a>
                        <!-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                        	role="tab" aria-controls="v-pills-profile" aria-selected="false">МЕТАБОЛИЗМ &rarr;</a> -->

                        <?php endforeach; ?>
                      </div>
                    </div>

                    <!-- выбираем маркер (транспорт) -->
                    <div class="col-6">
                    	<div class="tab-content" id="v-pills-tabContent">
                    		<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                    		aria-labelledby="v-pills-home-tab">
                    		<div class="row">
                    			<div class="col-4">
                    				<div class="list-group" id="list-tab" role="tablist">
                                        <!--<a class="list-group-item list-group-item-action" id="list-transport-list2"
                                            data-toggle="list" href="#list-transport2" role="tab"
                                            aria-controls="transport2">SLCO1B1 &rarr;</a>
                                         <a class="list-group-item list-group-item-action" id="list-transport-list2"
                                            data-toggle="list" href="#list-transport2" role="tab"
                                            aria-controls="transport2">ABCB1 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-transport-list2"
                                            data-toggle="list" href="#list-transport2" role="tab"
                                            aria-controls="transport2">ADH1B &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-transport-list2"
                                            data-toggle="list" href="#list-transport2" role="tab"
                                            aria-controls="transport2">SULT1A1 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-transport-list2"
                                            data-toggle="list" href="#list-transport2" role="tab"
                                            aria-controls="transport2">EPHX1 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-transport-list2"
                                            data-toggle="list" href="#list-transport2" role="tab"
                                            aria-controls="transport2">NAT2 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-transport-list2"
                                            data-toggle="list" href="#list-transport2" role="tab"
                                            aria-controls="transport2">TPMT &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-transport-list2"
                                            data-toggle="list" href="#list-transport2" role="tab"
                                            aria-controls="transport2">GSTP1 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-transport-list2"
                                            data-toggle="list" href="#list-transport2" role="tab"
                                            aria-controls="transport2">BCHE &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-transport-list2"
                                            data-toggle="list" href="#list-transport2" role="tab"
                                            aria-controls="transport2">DPYD &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-transport-list2"
                                            data-toggle="list" href="#list-transport2" role="tab"
                                            aria-controls="transport2">OPRM1 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-transport-list2"
                                            data-toggle="list" href="#list-transport2" role="tab"
                                            aria-controls="transport2">APOE &rarr;</a> -->
                                          </div>
                                        </div>
                                        <div class="col-8">
                                        	<div class="tab-content" id="nav-tabContent">
                                        		<div class="tab-pane fade show active" id="list-transport1" role="tabpanel"
                                        		aria-labelledby="list-home-list">
                                        		<table>
                                        			<thead>
                                        				<tr>
                                        					<td class="td_head">Nucleotide Change</td>
                                        					<td class="td_head">Allele Variant</td>
                                        					<td class="td_head">rs</td>
                                        					<td class="td_head">Genotype</td>
                                        					<td class="td_head">Include in Report</td>
                                        				</tr>
                                        			</thead>
                                        			<tbody>

                                                    </tbody>

                                                <!-- <tr>
                                                    <td>3730G>A</td>
                                                    <td>*H7</td>
                                                    <td>rs7294</td>
                                                    <td><select size='1' name='VKORC1_99' class='select'>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                            <option value='GA'>
                                                                G/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='VKORC1_99_checkbox' id='VKORC1_99_checkbox' /><label
                                                            for='G99'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>2255C>T</td>
                                                    <td>*H3</td>
                                                    <td>rs2359612</td>
                                                    <td><select size='1' name='VKORC1_100' class='select'>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                            <option value='CT'>
                                                                C/T
                                                            </option>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='VKORC1_100_checkbox' id='VKORC1_100_checkbox' /><label
                                                            for='G100'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1542G>C</td>
                                                    <td>*H3</td>
                                                    <td>rs8050894</td>
                                                    <td><select size='1' name='VKORC1_101' class='select'>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                            <option value='GA'>
                                                                G/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='VKORC1_101_checkbox' id='VKORC1_101_checkbox' /><label
                                                            for='G101'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1173C>T</td>
                                                    <td>*H4</td>
                                                    <td>rs9934438</td>
                                                    <td><select size='1' name='VKORC1_102' class='select'>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                            <option value='CT'>
                                                                C/T
                                                            </option>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='VKORC1_102_checkbox' id='VKORC1_102_checkbox' /><label
                                                            for='G102'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>497T>G</td>
                                                    <td>*H2</td>
                                                    <td>rs2884737</td>
                                                    <td><select size='1' name='VKORC1_103' class='select'>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                            <option value='TG'>
                                                                T/G
                                                            </option>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='VKORC1_103_checkbox' id='VKORC1_103_checkbox' /><label
                                                            for='G103'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>-1639G>A</td>
                                                    <td>*H4</td>
                                                    <td>rs9923231</td>
                                                    <td><select size='1' name='VKORC1_104' class='select'>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                            <option value='GA'>
                                                                G/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='VKORC1_104_checkbox' id='VKORC1_104_checkbox' /><label
                                                            for='G104'></label></td>
                                                </tr>
                                              </tr> -->
                                            </table>
                                          </div>

                                          <div class="tab-pane fade" id="list-transport2" role="tabpanel"
                                          aria-labelledby="list-transport-list2">

                                          <table>
                                          	<tr>
                                          		<td>Nucleotide Change</td>
                                          		<td>Allele Variant</td>
                                          		<td>rs</td>
                                          		<td>Genotype</td>
                                          		<td>Include in Report</td>
                                          	</tr>

                                          	<tr>
                                          		<td>521T>C</td>
                                          		<td>*5</td>
                                          		<td>rs4149056</td>
                                          		<td><select size='1' name='SLCO1B1_105' class='select'>
                                          			<option value='TT'>
                                          				T/T
                                          			</option>
                                          			<option value='TC'>
                                          				T/C
                                          			</option>
                                          			<option value='CC'>
                                          				C/C
                                          			</option>
                                          		</select></td>
                                          		<td><input type='checkbox' class='checkbox2'
                                          			name='SLCO1B1_105_checkbox'
                                          			id='SLCO1B1_105_checkbox' /><label for='G105'></label></td>
                                          		</tr>

                                          		<tr>
                                          			<td>388A>G</td>
                                          			<td>*1B</td>
                                          			<td>rs2306283</td>
                                          			<td><select size='1' name='SLCO1B1_106' class='select'>
                                          				<option value='AA'>
                                          					A/A
                                          				</option>
                                          				<option value='AG'>
                                          					A/G
                                          				</option>
                                          				<option value='GG'>
                                          					G/G
                                          				</option>
                                          			</select></td>
                                          			<td><input type='checkbox' class='checkbox2'
                                          				name='SLCO1B1_106_checkbox'
                                          				id='SLCO1B1_106_checkbox' /><label for='G106'></label></td>
                                          			</tr>

                                          			<tr>
                                          				<td>-910G>A</td>
                                          				<td>*17</td>
                                          				<td>rs4149015</td>
                                          				<td><select size='1' name='SLCO1B1_107' class='select'>
                                          					<option value='GG'>
                                          						G/G
                                          					</option>
                                          					<option value='GA'>
                                          						G/A
                                          					</option>
                                          					<option value='AA'>
                                          						A/A
                                          					</option>
                                          				</select></td>
                                          				<td><input type='checkbox' class='checkbox2'
                                          					name='SLCO1B1_107_checkbox'
                                          					id='SLCO1B1_107_checkbox' /><label for='G107'></label></td>
                                          				</tr>
                                          			</tr>
                                          		</table>
                                          	</div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- выбираем маркер (метаболизм) -->

                        <!-- <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="row">
                                <div class="col-4">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-meta-list1"
                                            data-toggle="list" href="#list-meta1" role="tab"
                                            aria-controls="meta1">CYP1A2 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">CYP2C9 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">CYP2C19 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">CYP2D6 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">CYP2A6 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">CYP2B6 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">CYP2C8 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">CYP2E1 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">CYP2J2 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">CYP3A4 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">CYP3A5 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">CYP4F2 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">UGT1A1 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">UGT1A4 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">UGT1A6 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">UGT1A8 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">UGT1A9 &rarr;</a>
                                        <a class="list-group-item list-group-item-action" id="list-meta-list2"
                                            data-toggle="list" href="#list-meta2" role="tab"
                                            aria-controls="meta2">UGT2B7 &rarr;</a>

                                    </div>
                                </div>

                                <div class="col-8">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="list-meta1" role="tabpanel"
                                            aria-labelledby="list-meta-list1">
                                            <table>
                                                <tr>
                                                    <td>Nucleotide Change</td>
                                                    <td>Allele Variant</td>
                                                    <td>rs</td>
                                                    <td>Genotype</td>
                                                    <td>Include in Report</td>
                                                </tr>

                                                <tr>
                                                    <td>-3860G>A</td>
                                                    <td>*1C</td>
                                                    <td>rs2069514</td>
                                                    <td><select size='1' name='CYP1A2_0' class='select'>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                            <option value='GA'>
                                                                G/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP1A2_0_checkbox' id='CYP1A2_0_checkbox' /><label
                                                            for='G0'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>-163C>A</td>
                                                    <td>*1F</td>
                                                    <td>rs762551</td>
                                                    <td><select size='1' name='CYP1A2_1' class='select'>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                            <option value='CA'>
                                                                C/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP1A2_1_checkbox' id='CYP1A2_1_checkbox' /><label
                                                            for='G1'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>-729C>T</td>
                                                    <td>*1K</td>
                                                    <td>rs12720461</td>
                                                    <td><select size='1' name='CYP1A2_2' class='select'>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                            <option value='CT'>
                                                                C/T
                                                            </option>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP1A2_2_checkbox' id='CYP1A2_2_checkbox' /><label
                                                            for='G2'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1042G>A</td>
                                                    <td>*3</td>
                                                    <td>rs56276455</td>
                                                    <td><select size='1' name='CYP1A2_3' class='select'>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                            <option value='GA'>
                                                                G/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP1A2_3_checkbox' id='CYP1A2_3_checkbox' /><label
                                                            for='G3'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1156A>G</td>
                                                    <td>*4</td>
                                                    <td>rs72547516</td>
                                                    <td><select size='1' name='CYP1A2_4' class='select'>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                            <option value='AG'>
                                                                A/G
                                                            </option>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP1A2_4_checkbox' id='CYP1A2_4_checkbox' /><label
                                                            for='G4'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1291C>T</td>
                                                    <td>*6</td>
                                                    <td>rs28399424</td>
                                                    <td><select size='1' name='CYP1A2_5' class='select'>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                            <option value='CT'>
                                                                C/T
                                                            </option>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP1A2_5_checkbox' id='CYP1A2_5_checkbox' /><label
                                                            for='G5'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1253+1G>A</td>
                                                    <td>*7</td>
                                                    <td>rs56107638</td>
                                                    <td><select size='1' name='CYP1A2_6' class='select'>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                            <option value='GA'>
                                                                G/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP1A2_6_checkbox' id='CYP1A2_6_checkbox' /><label
                                                            for='G6'></label></td>
                                                </tr>
                                                </tr>
                                            </table>

                                        </div>
                                        <div class="tab-pane fade" id="list-meta2" role="tabpanel"
                                            aria-labelledby="list-meta-list2">
                                            <table>
                                                <tr>
                                                    <td>Nucleotide Change</td>
                                                    <td>Allele Variant</td>
                                                    <td>rs</td>
                                                    <td>Genotype</td>
                                                    <td>Include in Report</td>
                                                </tr>

                                                <tr>
                                                    <td>430C>T</td>
                                                    <td>*2</td>
                                                    <td>rs1799853</td>
                                                    <td><select size='1' name='CYP2C9_7' class='select'>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                            <option value='CT'>
                                                                C/T
                                                            </option>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_7_checkbox' id='CYP2C9_7_checkbox' /><label
                                                            for='G7'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1075A>C</td>
                                                    <td>*3</td>
                                                    <td>rs1057910</td>
                                                    <td><select size='1' name='CYP2C9_8' class='select'>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                            <option value='AC'>
                                                                A/C
                                                            </option>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_8_checkbox' id='CYP2C9_8_checkbox' /><label
                                                            for='G8'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1076T>C</td>
                                                    <td>*4</td>
                                                    <td>rs56165452</td>
                                                    <td><select size='1' name='CYP2C9_9' class='select'>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                            <option value='TC'>
                                                                T/C
                                                            </option>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_9_checkbox' id='CYP2C9_9_checkbox' /><label
                                                            for='G9'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1080C>G</td>
                                                    <td>*5</td>
                                                    <td>rs28371686</td>
                                                    <td><select size='1' name='CYP2C9_10' class='select'>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                            <option value='CG'>
                                                                C/G
                                                            </option>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_10_checkbox' id='CYP2C9_10_checkbox' /><label
                                                            for='G10'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>817delA</td>
                                                    <td>*6</td>
                                                    <td>rs9332131</td>
                                                    <td><select size='1' name='CYP2C9_11' class='select'>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                            <option value='A-'>
                                                                A/-
                                                            </option>
                                                            <option value='--'>
                                                                -/-
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_11_checkbox' id='CYP2C9_11_checkbox' /><label
                                                            for='G11'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>55C>A</td>
                                                    <td>*7</td>
                                                    <td>rs67807361</td>
                                                    <td><select size='1' name='CYP2C9_12' class='select'>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                            <option value='CA'>
                                                                C/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_12_checkbox' id='CYP2C9_12_checkbox' /><label
                                                            for='G12'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>449G>A</td>
                                                    <td>*8</td>
                                                    <td>rs7900194</td>
                                                    <td><select size='1' name='CYP2C9_13' class='select'>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                            <option value='GA'>
                                                                G/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_13_checkbox' id='CYP2C9_13_checkbox' /><label
                                                            for='G13'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>752A>G</td>
                                                    <td>*9</td>
                                                    <td>rs2256871</td>
                                                    <td><select size='1' name='CYP2C9_14' class='select'>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                            <option value='AG'>
                                                                A/G
                                                            </option>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_14_checkbox' id='CYP2C9_14_checkbox' /><label
                                                            for='G14'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>815A>G</td>
                                                    <td>*10</td>
                                                    <td>rs9332130</td>
                                                    <td><select size='1' name='CYP2C9_15' class='select'>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                            <option value='AG'>
                                                                A/G
                                                            </option>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_15_checkbox' id='CYP2C9_15_checkbox' /><label
                                                            for='G15'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1003C>T</td>
                                                    <td>*11</td>
                                                    <td>rs28371685</td>
                                                    <td><select size='1' name='CYP2C9_16' class='select'>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                            <option value='CT'>
                                                                C/T
                                                            </option>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_16_checkbox' id='CYP2C9_16_checkbox' /><label
                                                            for='G16'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>269T>C</td>
                                                    <td>*13</td>
                                                    <td>rs72558187</td>
                                                    <td><select size='1' name='CYP2C9_17' class='select'>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                            <option value='TC'>
                                                                T/C
                                                            </option>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_17_checkbox' id='CYP2C9_17_checkbox' /><label
                                                            for='G17'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>485C>A</td>
                                                    <td>*15</td>
                                                    <td>rs72558190</td>
                                                    <td><select size='1' name='CYP2C9_18' class='select'>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                            <option value='CA'>
                                                                C/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_18_checkbox' id='CYP2C9_18_checkbox' /><label
                                                            for='G18'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>895A>G</td>
                                                    <td>*16</td>
                                                    <td>rs72558192</td>
                                                    <td><select size='1' name='CYP2C9_19' class='select'>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                            <option value='AG'>
                                                                A/G
                                                            </option>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_19_checkbox' id='CYP2C9_19_checkbox' /><label
                                                            for='G19'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>449G>T</td>
                                                    <td>*27</td>
                                                    <td>rs7900194</td>
                                                    <td><select size='1' name='CYP2C9_20' class='select'>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                            <option value='GT'>
                                                                G/T
                                                            </option>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                        </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                            name='CYP2C9_20_checkbox' id='CYP2C9_20_checkbox' /><label
                                                            for='G20'></label></td>
                                                </tr>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div> -->
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-outline-secondary" href="#">&larr; Назад</button>
                    <button type="button" class="btn btn-outline-success" href="#">Дальше &rarr;</button>

                    <!-- контент, таблица -->

            <!--
<ul>

            <label class='showMore' for='_12'>
                <p>VKORC1</p>
                </label><input id='_12' type='checkbox'>

            <div>
                    <table>

                        <tr>
                            <td class="td_head">Nucleotide Change</td>
                            <td class="td_head">Allele Variant</td>
                            <td class="td_head">rs</td>
                            <td class="td_head">Genotype</td>
                            <td class="td_head">Include in Report</td>
                        </tr>

                        <tr>
                            <td>3730G>A</td>
                            <td>*H7</td>
                            <td>rs7294</td>
                            <td><select size='1' name='VKORC1_99' class='select'>
                                <option value='GG'>
                                    G/G
                                </option>
                                <option value='GA'>
                                    G/A
                                </option>
                                <option value='AA'>
                                    A/A
                                </option>
                            </select></td>
                            <td><input type='checkbox' class='checkbox2'
                                       name='VKORC1_99_checkbox'
                                       id='VKORC1_99_checkbox'/><label
                                    for='G99'></label></td>
                        </tr>

                        <tr>
                            <td>2255C>T</td>
                            <td>*H3</td>
                            <td>rs2359612</td>
                            <td><select size='1' name='VKORC1_100' class='select'>
                                <option value='CC'>
                                    C/C
                                </option>
                                <option value='CT'>
                                    C/T
                                </option>
                                <option value='TT'>
                                    T/T
                                </option>
                            </select></td>
                            <td><input type='checkbox' class='checkbox2'
                                       name='VKORC1_100_checkbox'
                                       id='VKORC1_100_checkbox'/><label
                                    for='G100'></label></td>
                        </tr>

                        <tr>
                            <td>1542G>C</td>
                            <td>*H3</td>
                            <td>rs8050894</td>
                            <td><select size='1' name='VKORC1_101' class='select'>
                                <option value='GG'>
                                    G/G
                                </option>
                                <option value='GA'>
                                    G/A
                                </option>
                                <option value='AA'>
                                    A/A
                                </option>
                            </select></td>
                            <td><input type='checkbox' class='checkbox2'
                                       name='VKORC1_101_checkbox'
                                       id='VKORC1_101_checkbox'/><label
                                    for='G101'></label></td>
                        </tr>

                        <tr>
                            <td>1173C>T</td>
                            <td>*H4</td>
                            <td>rs9934438</td>
                            <td><select size='1' name='VKORC1_102' class='select'>
                                <option value='CC'>
                                    C/C
                                </option>
                                <option value='CT'>
                                    C/T
                                </option>
                                <option value='TT'>
                                    T/T
                                </option>
                            </select></td>
                            <td><input type='checkbox' class='checkbox2'
                                       name='VKORC1_102_checkbox'
                                       id='VKORC1_102_checkbox'/><label
                                    for='G102'></label></td>
                        </tr>

                        <tr>
                            <td>497T>G</td>
                            <td>*H2</td>
                            <td>rs2884737</td>
                            <td><select size='1' name='VKORC1_103' class='select'>
                                <option value='TT'>
                                    T/T
                                </option>
                                <option value='TG'>
                                    T/G
                                </option>
                                <option value='GG'>
                                    G/G
                                </option>
                            </select></td>
                            <td><input type='checkbox' class='checkbox2'
                                       name='VKORC1_103_checkbox'
                                       id='VKORC1_103_checkbox'/><label
                                    for='G103'></label></td>
                        </tr>

                        <tr>
                            <td>-1639G>A</td>
                            <td>*H4</td>
                            <td>rs9923231</td>
                            <td><select size='1' name='VKORC1_104' class='select'>
                                <option value='GG'>
                                    G/G
                                </option>
                                <option value='GA'>
                                    G/A
                                </option>
                                <option value='AA'>
                                    A/A
                                </option>
                            </select></td>
                            <td><input type='checkbox' class='checkbox2'
                                       name='VKORC1_104_checkbox'
                                       id='VKORC1_104_checkbox'/><label
                                    for='G104'></label></td>
                        </tr>
                        </tr> </table></div>

                <label class='showMore' for='_13'>
                    <p>SLCO1B1</p>
                    </label><input id='_13' type='checkbox'>
                    <div>
                        <table>
                            <tr>
                                <td>Nucleotide Change</td>
                                <td>Allele Variant</td>
                                <td>rs</td>
                                <td>Genotype</td>
                                <td>Include in Report</td>
                            </tr>

                            <tr>
                                <td>521T>C</td>
                                <td>*5</td>
                                <td>rs4149056</td>
                                <td><select size='1' name='SLCO1B1_105' class='select'>
                                    <option value='TT'>
                                        T/T
                                    </option>
                                    <option value='TC'>
                                        T/C
                                    </option>
                                    <option value='CC'>
                                        C/C
                                    </option>
                                </select></td>
                                <td><input type='checkbox' class='checkbox2'
                                           name='SLCO1B1_105_checkbox'
                                           id='SLCO1B1_105_checkbox'/><label
                                        for='G105'></label></td>
                            </tr>

                            <tr>
                                <td>388A>G</td>
                                <td>*1B</td>
                                <td>rs2306283</td>
                                <td><select size='1' name='SLCO1B1_106' class='select'>
                                    <option value='AA'>
                                        A/A
                                    </option>
                                    <option value='AG'>
                                        A/G
                                    </option>
                                    <option value='GG'>
                                        G/G
                                    </option>
                                </select></td>
                                <td><input type='checkbox' class='checkbox2'
                                           name='SLCO1B1_106_checkbox'
                                           id='SLCO1B1_106_checkbox'/><label
                                        for='G106'></label></td>
                            </tr>

                            <tr>
                                <td>-910G>A</td>
                                <td>*17</td>
                                <td>rs4149015</td>
                                <td><select size='1' name='SLCO1B1_107' class='select'>
                                    <option value='GG'>
                                        G/G
                                    </option>
                                    <option value='GA'>
                                        G/A
                                    </option>
                                    <option value='AA'>
                                        A/A
                                    </option>
                                </select></td>
                                <td><input type='checkbox' class='checkbox2'
                                           name='SLCO1B1_107_checkbox'
                                           id='SLCO1B1_107_checkbox'/><label
                                        for='G107'></label></td>
                            </tr>
                            </tr> </table></div>

                        <div class="btn-group dropright">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              ABCB1
                            </button>
                            <div class="dropdown-menu">
                                <table>
                                    <tr>
                                        <td>Nucleotide Change</td>
                                        <td>Allele Variant</td>
                                        <td>rs</td>
                                        <td>Genotype</td>
                                        <td>Include in Report</td>
                                    </tr>

                                    <tr>
                                        <td>3435C>T</td>
                                        <td>*6</td>
                                        <td>rs1045642</td>
                                        <td><select size='1' name='ABCB1_108' class='select'>
                                            <option value='CC'>
                                                C/C
                                            </option>
                                            <option value='CT'>
                                                C/T
                                            </option>
                                            <option value='TT'>
                                                T/T
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='ABCB1_108_checkbox'
                                                   id='ABCB1_108_checkbox'/><label
                                                for='G108'></label></td>
                                    </tr>

                                    <tr>
                                        <td>2677G>T</td>
                                        <td>*7</td>
                                        <td>rs2032582</td>
                                        <td><select size='1' name='ABCB1_109' class='select'>
                                            <option value='GG'>
                                                G/G
                                            </option>
                                            <option value='GT'>
                                                G/T
                                            </option>
                                            <option value='TT'>
                                                T/T
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='ABCB1_109_checkbox'
                                                   id='ABCB1_109_checkbox'/><label
                                                for='G109'></label></td>
                                    </tr>

                                    <tr>
                                        <td>1236C>T</td>
                                        <td>*8</td>
                                        <td>rs1128503</td>
                                        <td><select size='1' name='ABCB1_110' class='select'>
                                            <option value='CC'>
                                                C/C
                                            </option>
                                            <option value='CT'>
                                                C/T
                                            </option>
                                            <option value='TT'>
                                                T/T
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='ABCB1_110_checkbox'
                                                   id='ABCB1_110_checkbox'/><label
                                                for='G110'></label></td>
                                    </tr>
                                    </tr> </table>
                                    </div>


                    <label class='showMore' for='_14'>
                        <p>ABCB1</p>
                        </label><input id='_14' type='checkbox'>
                        <div>

                            <table>
                                <tr>
                                    <td>Nucleotide Change</td>
                                    <td>Allele Variant</td>
                                    <td>rs</td>
                                    <td>Genotype</td>
                                    <td>Include in Report</td>
                                </tr>

                                <tr>
                                    <td>3435C>T</td>
                                    <td>*6</td>
                                    <td>rs1045642</td>
                                    <td><select size='1' name='ABCB1_108' class='select'>
                                        <option value='CC'>
                                            C/C
                                        </option>
                                        <option value='CT'>
                                            C/T
                                        </option>
                                        <option value='TT'>
                                            T/T
                                        </option>
                                    </select></td>
                                    <td><input type='checkbox' class='checkbox2'
                                               name='ABCB1_108_checkbox'
                                               id='ABCB1_108_checkbox'/><label
                                            for='G108'></label></td>
                                </tr>

                                <tr>
                                    <td>2677G>T</td>
                                    <td>*7</td>
                                    <td>rs2032582</td>
                                    <td><select size='1' name='ABCB1_109' class='select'>
                                        <option value='GG'>
                                            G/G
                                        </option>
                                        <option value='GT'>
                                            G/T
                                        </option>
                                        <option value='TT'>
                                            T/T
                                        </option>
                                    </select></td>
                                    <td><input type='checkbox' class='checkbox2'
                                               name='ABCB1_109_checkbox'
                                               id='ABCB1_109_checkbox'/><label
                                            for='G109'></label></td>
                                </tr>

                                <tr>
                                    <td>1236C>T</td>
                                    <td>*8</td>
                                    <td>rs1128503</td>
                                    <td><select size='1' name='ABCB1_110' class='select'>
                                        <option value='CC'>
                                            C/C
                                        </option>
                                        <option value='CT'>
                                            C/T
                                        </option>
                                        <option value='TT'>
                                            T/T
                                        </option>
                                    </select></td>
                                    <td><input type='checkbox' class='checkbox2'
                                               name='ABCB1_110_checkbox'
                                               id='ABCB1_110_checkbox'/><label
                                            for='G110'></label></td>
                                </tr>
                                </tr> </table>

                        </div><br>

                        <div class="btn-group dropright">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              ADH1B
                            </button>
                            <div class="dropdown-menu">

                                <table>
                                    <tr>
                                        <td>Nucleotide Change</td>
                                        <td>Allele Variant</td>
                                        <td>rs</td>
                                        <td>Genotype</td>
                                        <td>Include in Report</td>
                                    </tr>

                                    <tr>
                                        <td>143A>G</td>
                                        <td>*2</td>
                                        <td>rs1229984</td>
                                        <td><select size='1' name='ADH1B_111' class='select'>
                                            <option value='AA'>
                                                A/A
                                            </option>
                                            <option value='AG'>
                                                A/G
                                            </option>
                                            <option value='GG'>
                                                G/G
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='ADH1B_111_checkbox'
                                                   id='ADH1B_111_checkbox'/><label
                                                for='G111'></label></td>
                                    </tr>

                                    <tr>
                                        <td>1108C>T</td>
                                        <td>*3</td>
                                        <td>rs2066702</td>
                                        <td><select size='1' name='ADH1B_112' class='select'>
                                            <option value='CC'>
                                                C/C
                                            </option>
                                            <option value='CT'>
                                                C/T
                                            </option>
                                            <option value='TT'>
                                                T/T
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='ADH1B_112_checkbox'
                                                   id='ADH1B_112_checkbox'/><label
                                                for='G112'></label></td>
                                    </tr>
                                    </tr> </table>
                </div>


                        <label class='showMore' for='_15'>
                            <p>ADH1B</p>
                            </label><input id='_15' type='checkbox'>
                            <div>

                                <table>
                                    <tr>
                                        <td>Nucleotide Change</td>
                                        <td>Allele Variant</td>
                                        <td>rs</td>
                                        <td>Genotype</td>
                                        <td>Include in Report</td>
                                    </tr>

                                    <tr>
                                        <td>143A>G</td>
                                        <td>*2</td>
                                        <td>rs1229984</td>
                                        <td><select size='1' name='ADH1B_111' class='select'>
                                            <option value='AA'>
                                                A/A
                                            </option>
                                            <option value='AG'>
                                                A/G
                                            </option>
                                            <option value='GG'>
                                                G/G
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='ADH1B_111_checkbox'
                                                   id='ADH1B_111_checkbox'/><label
                                                for='G111'></label></td>
                                    </tr>

                                    <tr>
                                        <td>1108C>T</td>
                                        <td>*3</td>
                                        <td>rs2066702</td>
                                        <td><select size='1' name='ADH1B_112' class='select'>
                                            <option value='CC'>
                                                C/C
                                            </option>
                                            <option value='CT'>
                                                C/T
                                            </option>
                                            <option value='TT'>
                                                T/T
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='ADH1B_112_checkbox'
                                                   id='ADH1B_112_checkbox'/><label
                                                for='G112'></label></td>
                                    </tr>
                                    </tr> </table>

                            </div><br>

                            <div class="btn-group dropright">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  SULT1A1
                                </button>
                                <div class="dropdown-menu">

                                    <table>
                                        <tr>
                                            <td>Nucleotide Change</td>
                                            <td>Allele Variant</td>
                                            <td>rs</td>
                                            <td>Genotype</td>
                                            <td>Include in Report</td>
                                        </tr>

                                        <tr>
                                            <td>638G>A</td>
                                            <td>*2</td>
                                            <td>rs9282861</td>
                                            <td><select size='1' name='SULT1A1_113' class='select'>
                                                <option value='GG'>
                                                    G/G
                                                </option>
                                                <option value='GA'>
                                                    G/A
                                                </option>
                                                <option value='AA'>
                                                    A/A
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='SULT1A1_113_checkbox'
                                                       id='SULT1A1_113_checkbox'/><label
                                                    for='G113'></label></td>
                                        </tr>

                                        <tr>
                                            <td>667G>A</td>
                                            <td>*3</td>
                                            <td>rs1801030</td>
                                            <td><select size='1' name='SULT1A1_114' class='select'>
                                                <option value='GG'>
                                                    G/G
                                                </option>
                                                <option value='GA'>
                                                    G/A
                                                </option>
                                                <option value='AA'>
                                                    A/A
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='SULT1A1_114_checkbox'
                                                       id='SULT1A1_114_checkbox'/><label
                                                    for='G114'></label></td>
                                        </tr>
                                        </tr> </table>
                                        </div>
                                        </div>


                            <label class='showMore' for='_16'>
                                <p>SULT1A1</p>
                                </label><input id='_16' type='checkbox'>
                                <div>

                                    <table>
                                        <tr>
                                            <td>Nucleotide Change</td>
                                            <td>Allele Variant</td>
                                            <td>rs</td>
                                            <td>Genotype</td>
                                            <td>Include in Report</td>
                                        </tr>

                                        <tr>
                                            <td>638G>A</td>
                                            <td>*2</td>
                                            <td>rs9282861</td>
                                            <td><select size='1' name='SULT1A1_113' class='select'>
                                                <option value='GG'>
                                                    G/G
                                                </option>
                                                <option value='GA'>
                                                    G/A
                                                </option>
                                                <option value='AA'>
                                                    A/A
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='SULT1A1_113_checkbox'
                                                       id='SULT1A1_113_checkbox'/><label
                                                    for='G113'></label></td>
                                        </tr>

                                        <tr>
                                            <td>667G>A</td>
                                            <td>*3</td>
                                            <td>rs1801030</td>
                                            <td><select size='1' name='SULT1A1_114' class='select'>
                                                <option value='GG'>
                                                    G/G
                                                </option>
                                                <option value='GA'>
                                                    G/A
                                                </option>
                                                <option value='AA'>
                                                    A/A
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='SULT1A1_114_checkbox'
                                                       id='SULT1A1_114_checkbox'/><label
                                                    for='G114'></label></td>
                                        </tr>
                                        </tr> </table>

                                    </div>

<br>
                                <div class="btn-group dropright">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      EPHX1
                                    </button>
                                    <div class="dropdown-menu">

                                        <table>
                                            <tr>
                                                <td>Nucleotide Change</td>
                                                <td>Allele Variant</td>
                                                <td>rs</td>
                                                <td>Genotype</td>
                                                <td>Include in Report</td>
                                            </tr>

                                            <tr>
                                                <td>337T>C</td>
                                                <td>*113His</td>
                                                <td>rs1051740</td>
                                                <td><select size='1' name='EPHX1_115' class='select'>
                                                    <option value='TT'>
                                                        T/T
                                                    </option>
                                                    <option value='TC'>
                                                        T/C
                                                    </option>
                                                    <option value='CC'>
                                                        C/C
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='EPHX1_115_checkbox'
                                                           id='EPHX1_115_checkbox'/><label
                                                        for='G115'></label></td>
                                            </tr>

                                            <tr>
                                                <td>416A>G</td>
                                                <td>*139Arg</td>
                                                <td>rs2234922</td>
                                                <td><select size='1' name='EPHX1_116' class='select'>
                                                    <option value='AA'>
                                                        A/A
                                                    </option>
                                                    <option value='AG'>
                                                        A/G
                                                    </option>
                                                    <option value='GG'>
                                                        G/G
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='EPHX1_116_checkbox'
                                                           id='EPHX1_116_checkbox'/><label
                                                        for='G116'></label></td>
                                            </tr>
                                            </tr> </table>
                                            </div>
                                            </div>

                                    <label class='showMore' for='_17'>
                                        <p>EPHX1</p>
                                        </label><input id='_17' type='checkbox'>
                                        <div>

                                            <table>
                                                <tr>
                                                    <td>Nucleotide Change</td>
                                                    <td>Allele Variant</td>
                                                    <td>rs</td>
                                                    <td>Genotype</td>
                                                    <td>Include in Report</td>
                                                </tr>

                                                <tr>
                                                    <td>337T>C</td>
                                                    <td>*113His</td>
                                                    <td>rs1051740</td>
                                                    <td><select size='1' name='EPHX1_115' class='select'>
                                                        <option value='TT'>
                                                            T/T
                                                        </option>
                                                        <option value='TC'>
                                                            T/C
                                                        </option>
                                                        <option value='CC'>
                                                            C/C
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='EPHX1_115_checkbox'
                                                               id='EPHX1_115_checkbox'/><label
                                                            for='G115'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>416A>G</td>
                                                    <td>*139Arg</td>
                                                    <td>rs2234922</td>
                                                    <td><select size='1' name='EPHX1_116' class='select'>
                                                        <option value='AA'>
                                                            A/A
                                                        </option>
                                                        <option value='AG'>
                                                            A/G
                                                        </option>
                                                        <option value='GG'>
                                                            G/G
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='EPHX1_116_checkbox'
                                                               id='EPHX1_116_checkbox'/><label
                                                            for='G116'></label></td>
                                                </tr>
                                                </tr> </table>

                                        </div>

<br>
                                    <div class="btn-group dropright">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          NAT2
                                        </button>
                                        <div class="dropdown-menu">

                                            <table>
                                                <tr>
                                                    <td>Nucleotide Change</td>
                                                    <td>Allele Variant</td>
                                                    <td>rs</td>
                                                    <td>Genotype</td>
                                                    <td>Include in Report</td>
                                                </tr>

                                                <tr>
                                                    <td>341T>C</td>
                                                    <td>*5</td>
                                                    <td>rs1801280</td>
                                                    <td><select size='1' name='NAT2_117' class='select'>
                                                        <option value='TT'>
                                                            T/T
                                                        </option>
                                                        <option value='TC'>
                                                            T/C
                                                        </option>
                                                        <option value='CC'>
                                                            C/C
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='NAT2_117_checkbox'
                                                               id='NAT2_117_checkbox'/><label
                                                            for='G117'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>590G>A</td>
                                                    <td>*6</td>
                                                    <td>rs1799930</td>
                                                    <td><select size='1' name='NAT2_118' class='select'>
                                                        <option value='GG'>
                                                            G/G
                                                        </option>
                                                        <option value='GA'>
                                                            G/A
                                                        </option>
                                                        <option value='AA'>
                                                            A/A
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='NAT2_118_checkbox'
                                                               id='NAT2_118_checkbox'/><label
                                                            for='G118'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>857G>A</td>
                                                    <td>*7</td>
                                                    <td>rs1799931</td>
                                                    <td><select size='1' name='NAT2_119' class='select'>
                                                        <option value='GG'>
                                                            G/G
                                                        </option>
                                                        <option value='GA'>
                                                            G/A
                                                        </option>
                                                        <option value='AA'>
                                                            A/A
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='NAT2_119_checkbox'
                                                               id='NAT2_119_checkbox'/><label
                                                            for='G119'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>481C>T</td>
                                                    <td>*11</td>
                                                    <td>rs1799929</td>
                                                    <td><select size='1' name='NAT2_120' class='select'>
                                                        <option value='CC'>
                                                            C/C
                                                        </option>
                                                        <option value='CT'>
                                                            C/T
                                                        </option>
                                                        <option value='TT'>
                                                            T/T
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='NAT2_120_checkbox'
                                                               id='NAT2_120_checkbox'/><label
                                                            for='G120'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>803A>G</td>
                                                    <td>*12</td>
                                                    <td>rs1208</td>
                                                    <td><select size='1' name='NAT2_121' class='select'>
                                                        <option value='AA'>
                                                            A/A
                                                        </option>
                                                        <option value='AG'>
                                                            A/G
                                                        </option>
                                                        <option value='GG'>
                                                            G/G
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='NAT2_121_checkbox'
                                                               id='NAT2_121_checkbox'/><label
                                                            for='G121'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>282C>T</td>
                                                    <td>*13</td>
                                                    <td>rs1041983</td>
                                                    <td><select size='1' name='NAT2_122' class='select'>
                                                        <option value='CC'>
                                                            C/C
                                                        </option>
                                                        <option value='CT'>
                                                            C/T
                                                        </option>
                                                        <option value='TT'>
                                                            T/T
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='NAT2_122_checkbox'
                                                               id='NAT2_122_checkbox'/><label
                                                            for='G122'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>191G>A</td>
                                                    <td>*14</td>
                                                    <td>rs1801279</td>
                                                    <td><select size='1' name='NAT2_123' class='select'>
                                                        <option value='GG'>
                                                            G/G
                                                        </option>
                                                        <option value='GA'>
                                                            G/A
                                                        </option>
                                                        <option value='AA'>
                                                            A/A
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='NAT2_123_checkbox'
                                                               id='NAT2_123_checkbox'/><label
                                                            for='G123'></label></td>
                                                </tr>
                                                </tr> </table>
                    </div>
                    </div>


                                        <label class='showMore' for='_18'>
                                            <p>NAT2</p>
                                            </label><input id='_18' type='checkbox'>
                                            <div>

                                                <table>
                                                    <tr>
                                                        <td>Nucleotide Change</td>
                                                        <td>Allele Variant</td>
                                                        <td>rs</td>
                                                        <td>Genotype</td>
                                                        <td>Include in Report</td>
                                                    </tr>

                                                    <tr>
                                                        <td>341T>C</td>
                                                        <td>*5</td>
                                                        <td>rs1801280</td>
                                                        <td><select size='1' name='NAT2_117' class='select'>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                            <option value='TC'>
                                                                T/C
                                                            </option>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='NAT2_117_checkbox'
                                                                   id='NAT2_117_checkbox'/><label
                                                                for='G117'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>590G>A</td>
                                                        <td>*6</td>
                                                        <td>rs1799930</td>
                                                        <td><select size='1' name='NAT2_118' class='select'>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                            <option value='GA'>
                                                                G/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='NAT2_118_checkbox'
                                                                   id='NAT2_118_checkbox'/><label
                                                                for='G118'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>857G>A</td>
                                                        <td>*7</td>
                                                        <td>rs1799931</td>
                                                        <td><select size='1' name='NAT2_119' class='select'>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                            <option value='GA'>
                                                                G/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='NAT2_119_checkbox'
                                                                   id='NAT2_119_checkbox'/><label
                                                                for='G119'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>481C>T</td>
                                                        <td>*11</td>
                                                        <td>rs1799929</td>
                                                        <td><select size='1' name='NAT2_120' class='select'>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                            <option value='CT'>
                                                                C/T
                                                            </option>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='NAT2_120_checkbox'
                                                                   id='NAT2_120_checkbox'/><label
                                                                for='G120'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>803A>G</td>
                                                        <td>*12</td>
                                                        <td>rs1208</td>
                                                        <td><select size='1' name='NAT2_121' class='select'>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                            <option value='AG'>
                                                                A/G
                                                            </option>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='NAT2_121_checkbox'
                                                                   id='NAT2_121_checkbox'/><label
                                                                for='G121'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>282C>T</td>
                                                        <td>*13</td>
                                                        <td>rs1041983</td>
                                                        <td><select size='1' name='NAT2_122' class='select'>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                            <option value='CT'>
                                                                C/T
                                                            </option>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='NAT2_122_checkbox'
                                                                   id='NAT2_122_checkbox'/><label
                                                                for='G122'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>191G>A</td>
                                                        <td>*14</td>
                                                        <td>rs1801279</td>
                                                        <td><select size='1' name='NAT2_123' class='select'>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                            <option value='GA'>
                                                                G/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='NAT2_123_checkbox'
                                                                   id='NAT2_123_checkbox'/><label
                                                                for='G123'></label></td>
                                                    </tr>
                                                    </tr> </table>

                                            </div>


                                            <label class='showMore' for='_19'>
                                                <p>TPMT</p>
                                                </label><input id='_19' type='checkbox'>
                                                <div>

                                                    <table>
                                                        <tr>
                                                            <td>Nucleotide Change</td>
                                                            <td>Allele Variant</td>
                                                            <td>rs</td>
                                                            <td>Genotype</td>
                                                            <td>Include in Report</td>
                                                        </tr>

                                                        <tr>
                                                            <td>238G>C</td>
                                                            <td>*2</td>
                                                            <td>rs1800462</td>
                                                            <td><select size='1' name='TPMT_124' class='select'>
                                                                <option value='GG'>
                                                                    G/G
                                                                </option>
                                                                <option value='GC'>
                                                                    G/C
                                                                </option>
                                                                <option value='CC'>
                                                                    C/C
                                                                </option>
                                                            </select></td>
                                                            <td><input type='checkbox' class='checkbox2'
                                                                       name='TPMT_124_checkbox'
                                                                       id='TPMT_124_checkbox'/><label
                                                                    for='G124'></label></td>
                                                        </tr>

                                                        <tr>
                                                            <td>460A>G</td>
                                                            <td>*3A*3B</td>
                                                            <td>rs1800460</td>
                                                            <td><select size='1' name='TPMT_125' class='select'>
                                                                <option value='AA'>
                                                                    A/A
                                                                </option>
                                                                <option value='AG'>
                                                                    A/G
                                                                </option>
                                                                <option value='GG'>
                                                                    G/G
                                                                </option>
                                                            </select></td>
                                                            <td><input type='checkbox' class='checkbox2'
                                                                       name='TPMT_125_checkbox'
                                                                       id='TPMT_125_checkbox'/><label
                                                                    for='G125'></label></td>
                                                        </tr>

                                                        <tr>
                                                            <td>719A>G</td>
                                                            <td>*3A*3C</td>
                                                            <td>rs1142345</td>
                                                            <td><select size='1' name='TPMT_126' class='select'>
                                                                <option value='AA'>
                                                                    A/A
                                                                </option>
                                                                <option value='AG'>
                                                                    A/G
                                                                </option>
                                                                <option value='GG'>
                                                                    G/G
                                                                </option>
                                                            </select></td>
                                                            <td><input type='checkbox' class='checkbox2'
                                                                       name='TPMT_126_checkbox'
                                                                       id='TPMT_126_checkbox'/><label
                                                                    for='G126'></label></td>
                                                        </tr>

                                                        <tr>
                                                            <td>626-1G>A</td>
                                                            <td>*4</td>
                                                            <td>rs1800584</td>
                                                            <td><select size='1' name='TPMT_127' class='select'>
                                                                <option value='GG'>
                                                                    G/G
                                                                </option>
                                                                <option value='GA'>
                                                                    G/A
                                                                </option>
                                                                <option value='AA'>
                                                                    A/A
                                                                </option>
                                                            </select></td>
                                                            <td><input type='checkbox' class='checkbox2'
                                                                       name='TPMT_127_checkbox'
                                                                       id='TPMT_127_checkbox'/><label
                                                                    for='G127'></label></td>
                                                        </tr>
                                                        </tr> </table>

                                                </div>

                                                <label class='showMore' for='_20'>
                                                    <p>GSTP1</p>
                                                    </label><input id='_20' type='checkbox'>
                                                    <div>

                                                        <table>
                                                            <tr>
                                                                <td>Nucleotide Change</td>
                                                                <td>Allele Variant</td>
                                                                <td>rs</td>
                                                                <td>Genotype</td>
                                                                <td>Include in Report</td>
                                                            </tr>

                                                            <tr>
                                                                <td>313A>G</td>
                                                                <td>*1B*1C</td>
                                                                <td>rs1695</td>
                                                                <td><select size='1' name='GSTP1_128' class='select'>
                                                                    <option value='AA'>
                                                                        A/A
                                                                    </option>
                                                                    <option value='AG'>
                                                                        A/G
                                                                    </option>
                                                                    <option value='GG'>
                                                                        G/G
                                                                    </option>
                                                                </select></td>
                                                                <td><input type='checkbox' class='checkbox2'
                                                                           name='GSTP1_128_checkbox'
                                                                           id='GSTP1_128_checkbox'/><label
                                                                        for='G128'></label></td>
                                                            </tr>

                                                            <tr>
                                                                <td>341C>T</td>
                                                                <td>*1C*1D</td>
                                                                <td>rs1138272</td>
                                                                <td><select size='1' name='GSTP1_129' class='select'>
                                                                    <option value='CC'>
                                                                        C/C
                                                                    </option>
                                                                    <option value='CT'>
                                                                        C/T
                                                                    </option>
                                                                    <option value='TT'>
                                                                        T/T
                                                                    </option>
                                                                </select></td>
                                                                <td><input type='checkbox' class='checkbox2'
                                                                           name='GSTP1_129_checkbox'
                                                                           id='GSTP1_129_checkbox'/><label
                                                                        for='G129'></label></td>
                                                            </tr>
                                                            </tr> </table>

                                                    </div>

                                                    <label class='showMore' for='_21'>
                                                        <p>BCHE</p>
                                                        </label><input id='_21' type='checkbox'>
                                                        <div>

                                                            <table>
                                                                <tr>
                                                                    <td>Nucleotide Change</td>
                                                                    <td>Allele Variant</td>
                                                                    <td>rs</td>
                                                                    <td>Genotype</td>
                                                                    <td>Include in Report</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>293A>G</td>
                                                                    <td>*70G</td>
                                                                    <td>rs1799807</td>
                                                                    <td><select size='1' name='BCHE_130' class='select'>
                                                                        <option value='AA'>
                                                                            A/A
                                                                        </option>
                                                                        <option value='AG'>
                                                                            A/G
                                                                        </option>
                                                                        <option value='GG'>
                                                                            G/G
                                                                        </option>
                                                                    </select></td>
                                                                    <td><input type='checkbox' class='checkbox2'
                                                                               name='BCHE_130_checkbox'
                                                                               id='BCHE_130_checkbox'/><label
                                                                            for='G130'></label></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>1699G>A</td>
                                                                    <td>*539T</td>
                                                                    <td>rs1803274</td>
                                                                    <td><select size='1' name='BCHE_131' class='select'>
                                                                        <option value='GG'>
                                                                            G/G
                                                                        </option>
                                                                        <option value='GA'>
                                                                            G/A
                                                                        </option>
                                                                        <option value='AA'>
                                                                            A/A
                                                                        </option>
                                                                    </select></td>
                                                                    <td><input type='checkbox' class='checkbox2'
                                                                               name='BCHE_131_checkbox'
                                                                               id='BCHE_131_checkbox'/><label
                                                                            for='G131'></label></td>
                                                                </tr>
                                                                </tr> </table>

                                                        </div>

                                                        <label class='showMore' for='_28'>
                                                            <p>DPYD</p>
                                                            </label><input id='_28' type='checkbox'>
                                                            <div>

                                                                <table>
                                                                    <tr>
                                                                        <td>Nucleotide Change</td>
                                                                        <td>Allele Variant</td>
                                                                        <td>rs</td>
                                                                        <td>Genotype</td>
                                                                        <td>Include in Report</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>1905+1G>A</td>
                                                                        <td>*2A</td>
                                                                        <td>rs3918290</td>
                                                                        <td><select size='1' name='DPYD_141' class='select'>
                                                                            <option value='GG'>
                                                                                G/G
                                                                            </option>
                                                                            <option value='GA'>
                                                                                G/A
                                                                            </option>
                                                                            <option value='AA'>
                                                                                A/A
                                                                            </option>
                                                                        </select></td>
                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                   name='DPYD_141_checkbox'
                                                                                   id='DPYD_141_checkbox'/><label
                                                                                for='G141'></label></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>1679T>G</td>
                                                                        <td>*13</td>
                                                                        <td>rs55886062</td>
                                                                        <td><select size='1' name='DPYD_142' class='select'>
                                                                            <option value='TT'>
                                                                                T/T
                                                                            </option>
                                                                            <option value='TG'>
                                                                                T/G
                                                                            </option>
                                                                            <option value='GG'>
                                                                                G/G
                                                                            </option>
                                                                        </select></td>
                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                   name='DPYD_142_checkbox'
                                                                                   id='DPYD_142_checkbox'/><label
                                                                                for='G142'></label></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>2846A>T</td>
                                                                        <td>*D949V</td>
                                                                        <td>rs67376798</td>
                                                                        <td><select size='1' name='DPYD_143' class='select'>
                                                                            <option value='AA'>
                                                                                A/A
                                                                            </option>
                                                                            <option value='AT'>
                                                                                A/T
                                                                            </option>
                                                                            <option value='TT'>
                                                                                T/T
                                                                            </option>
                                                                        </select></td>
                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                   name='DPYD_143_checkbox'
                                                                                   id='DPYD_143_checkbox'/><label
                                                                                for='G143'></label></td>
                                                                    </tr>
                                                                    </tr> </table>

                                                            </div>

                                                            <label class='showMore' for='_29'>
                                                                <p>OPRM1</p>
                                                                </label><input id='_29' type='checkbox'>
                                                                <div>

                                                                    <table>
                                                                        <tr>
                                                                            <td>Nucleotide Change</td>
                                                                            <td>Allele Variant</td>
                                                                            <td>rs</td>
                                                                            <td>Genotype</td>
                                                                            <td>Include in Report</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>118A>G</td>
                                                                            <td>*2</td>
                                                                            <td>rs1799971</td>
                                                                            <td><select size='1' name='OPRM1_144' class='select'>
                                                                                <option value='AA'>
                                                                                    A/A
                                                                                </option>
                                                                                <option value='AG'>
                                                                                    A/G
                                                                                </option>
                                                                                <option value='GG'>
                                                                                    G/G
                                                                                </option>
                                                                            </select></td>
                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                       name='OPRM1_144_checkbox'
                                                                                       id='OPRM1_144_checkbox'/><label
                                                                                    for='G144'></label></td>
                                                                        </tr>
                                                                        </tr> </table>

                                                                </div>

                                                                <label class='showMore' for='_30'>
                                                                    <p>APOE</p>
                                                                    </label><input id='_30' type='checkbox'>
                                                                    <div>

                                                                        <table>
                                                                            <tr>
                                                                                <td>Nucleotide Change</td>
                                                                                <td>Allele Variant</td>
                                                                                <td>rs</td>
                                                                                <td>Genotype</td>
                                                                                <td>Include in Report</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td>526C>T</td>
                                                                                <td>*2</td>
                                                                                <td>rs7412</td>
                                                                                <td><select size='1' name='APOE_145' class='select'>
                                                                                    <option value='CC'>
                                                                                        C/C
                                                                                    </option>
                                                                                    <option value='CT'>
                                                                                        C/T
                                                                                    </option>
                                                                                    <option value='TT'>
                                                                                        T/T
                                                                                    </option>
                                                                                </select></td>
                                                                                <td><input type='checkbox' class='checkbox2'
                                                                                           name='APOE_145_checkbox'
                                                                                           id='APOE_145_checkbox'/><label
                                                                                        for='G145'></label></td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td>388T>C</td>
                                                                                <td>*4</td>
                                                                                <td>rs429358</td>
                                                                                <td><select size='1' name='APOE_146' class='select'>
                                                                                    <option value='TT'>
                                                                                        T/T
                                                                                    </option>
                                                                                    <option value='TC'>
                                                                                        T/C
                                                                                    </option>
                                                                                    <option value='CC'>
                                                                                        C/C
                                                                                    </option>
                                                                                </select></td>
                                                                                <td><input type='checkbox' class='checkbox2'
                                                                                           name='APOE_146_checkbox'
                                                                                           id='APOE_146_checkbox'/><label
                                                                                        for='G146'></label></td>
                                                                            </tr>
                                                                            </tr> </table>

                                                                    </div>


                                                                  -->
                                                                </ul>

                                                              </div>


                                                              <!-- выбираем маркер (метаболизм) -->

        <!--
              <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                <ul>
                    <label class='showMore' for='_0'>
                        <p>CYP1A2</p>
                        </label><input id='_0' type='checkbox'>
                        <div>

                            <table>
                                <tr>
                                    <td>Nucleotide Change</td>
                                    <td>Allele Variant</td>
                                    <td>rs</td>
                                    <td>Genotype</td>
                                    <td>Include in Report</td>
                                </tr>

                                <tr>
                                    <td>-3860G>A</td>
                                    <td>*1C</td>
                                    <td>rs2069514</td>
                                    <td><select size='1' name='CYP1A2_0' class='select'>
                                        <option value='GG'>
                                            G/G
                                        </option>
                                        <option value='GA'>
                                            G/A
                                        </option>
                                        <option value='AA'>
                                            A/A
                                        </option>
                                    </select></td>
                                    <td><input type='checkbox' class='checkbox2'
                                               name='CYP1A2_0_checkbox'
                                               id='CYP1A2_0_checkbox'/><label
                                            for='G0'></label></td>
                                </tr>

                                <tr>
                                    <td>-163C>A</td>
                                    <td>*1F</td>
                                    <td>rs762551</td>
                                    <td><select size='1' name='CYP1A2_1' class='select'>
                                        <option value='CC'>
                                            C/C
                                        </option>
                                        <option value='CA'>
                                            C/A
                                        </option>
                                        <option value='AA'>
                                            A/A
                                        </option>
                                    </select></td>
                                    <td><input type='checkbox' class='checkbox2'
                                               name='CYP1A2_1_checkbox'
                                               id='CYP1A2_1_checkbox'/><label
                                            for='G1'></label></td>
                                </tr>

                                <tr>
                                    <td>-729C>T</td>
                                    <td>*1K</td>
                                    <td>rs12720461</td>
                                    <td><select size='1' name='CYP1A2_2' class='select'>
                                        <option value='CC'>
                                            C/C
                                        </option>
                                        <option value='CT'>
                                            C/T
                                        </option>
                                        <option value='TT'>
                                            T/T
                                        </option>
                                    </select></td>
                                    <td><input type='checkbox' class='checkbox2'
                                               name='CYP1A2_2_checkbox'
                                               id='CYP1A2_2_checkbox'/><label
                                            for='G2'></label></td>
                                </tr>

                                <tr>
                                    <td>1042G>A</td>
                                    <td>*3</td>
                                    <td>rs56276455</td>
                                    <td><select size='1' name='CYP1A2_3' class='select'>
                                        <option value='GG'>
                                            G/G
                                        </option>
                                        <option value='GA'>
                                            G/A
                                        </option>
                                        <option value='AA'>
                                            A/A
                                        </option>
                                    </select></td>
                                    <td><input type='checkbox' class='checkbox2'
                                               name='CYP1A2_3_checkbox'
                                               id='CYP1A2_3_checkbox'/><label
                                            for='G3'></label></td>
                                </tr>

                                <tr>
                                    <td>1156A>G</td>
                                    <td>*4</td>
                                    <td>rs72547516</td>
                                    <td><select size='1' name='CYP1A2_4' class='select'>
                                        <option value='AA'>
                                            A/A
                                        </option>
                                        <option value='AG'>
                                            A/G
                                        </option>
                                        <option value='GG'>
                                            G/G
                                        </option>
                                    </select></td>
                                    <td><input type='checkbox' class='checkbox2'
                                               name='CYP1A2_4_checkbox'
                                               id='CYP1A2_4_checkbox'/><label
                                            for='G4'></label></td>
                                </tr>

                                <tr>
                                    <td>1291C>T</td>
                                    <td>*6</td>
                                    <td>rs28399424</td>
                                    <td><select size='1' name='CYP1A2_5' class='select'>
                                        <option value='CC'>
                                            C/C
                                        </option>
                                        <option value='CT'>
                                            C/T
                                        </option>
                                        <option value='TT'>
                                            T/T
                                        </option>
                                    </select></td>
                                    <td><input type='checkbox' class='checkbox2'
                                               name='CYP1A2_5_checkbox'
                                               id='CYP1A2_5_checkbox'/><label
                                            for='G5'></label></td>
                                </tr>

                                <tr>
                                    <td>1253+1G>A</td>
                                    <td>*7</td>
                                    <td>rs56107638</td>
                                    <td><select size='1' name='CYP1A2_6' class='select'>
                                        <option value='GG'>
                                            G/G
                                        </option>
                                        <option value='GA'>
                                            G/A
                                        </option>
                                        <option value='AA'>
                                            A/A
                                        </option>
                                    </select></td>
                                    <td><input type='checkbox' class='checkbox2'
                                               name='CYP1A2_6_checkbox'
                                               id='CYP1A2_6_checkbox'/><label
                                            for='G6'></label></td>
                                </tr>
                                </tr> </table>

                        </div>

                        <label class='showMore' for='_1'>
                            <p>CYP2C9</p>
                            </label><input id='_1' type='checkbox'>
                            <div>

                                <table>
                                    <tr>
                                        <td>Nucleotide Change</td>
                                        <td>Allele Variant</td>
                                        <td>rs</td>
                                        <td>Genotype</td>
                                        <td>Include in Report</td>
                                    </tr>

                                    <tr>
                                        <td>430C>T</td>
                                        <td>*2</td>
                                        <td>rs1799853</td>
                                        <td><select size='1' name='CYP2C9_7' class='select'>
                                            <option value='CC'>
                                                C/C
                                            </option>
                                            <option value='CT'>
                                                C/T
                                            </option>
                                            <option value='TT'>
                                                T/T
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_7_checkbox'
                                                   id='CYP2C9_7_checkbox'/><label
                                                for='G7'></label></td>
                                    </tr>

                                    <tr>
                                        <td>1075A>C</td>
                                        <td>*3</td>
                                        <td>rs1057910</td>
                                        <td><select size='1' name='CYP2C9_8' class='select'>
                                            <option value='AA'>
                                                A/A
                                            </option>
                                            <option value='AC'>
                                                A/C
                                            </option>
                                            <option value='CC'>
                                                C/C
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_8_checkbox'
                                                   id='CYP2C9_8_checkbox'/><label
                                                for='G8'></label></td>
                                    </tr>

                                    <tr>
                                        <td>1076T>C</td>
                                        <td>*4</td>
                                        <td>rs56165452</td>
                                        <td><select size='1' name='CYP2C9_9' class='select'>
                                            <option value='TT'>
                                                T/T
                                            </option>
                                            <option value='TC'>
                                                T/C
                                            </option>
                                            <option value='CC'>
                                                C/C
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_9_checkbox'
                                                   id='CYP2C9_9_checkbox'/><label
                                                for='G9'></label></td>
                                    </tr>

                                    <tr>
                                        <td>1080C>G</td>
                                        <td>*5</td>
                                        <td>rs28371686</td>
                                        <td><select size='1' name='CYP2C9_10' class='select'>
                                            <option value='CC'>
                                                C/C
                                            </option>
                                            <option value='CG'>
                                                C/G
                                            </option>
                                            <option value='GG'>
                                                G/G
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_10_checkbox'
                                                   id='CYP2C9_10_checkbox'/><label
                                                for='G10'></label></td>
                                    </tr>

                                    <tr>
                                        <td>817delA</td>
                                        <td>*6</td>
                                        <td>rs9332131</td>
                                        <td><select size='1' name='CYP2C9_11' class='select'>
                                            <option value='AA'>
                                                A/A
                                            </option>
                                            <option value='A-'>
                                                A/-
                                            </option>
                                            <option value='--'>
                                                -/-
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_11_checkbox'
                                                   id='CYP2C9_11_checkbox'/><label
                                                for='G11'></label></td>
                                    </tr>

                                    <tr>
                                        <td>55C>A</td>
                                        <td>*7</td>
                                        <td>rs67807361</td>
                                        <td><select size='1' name='CYP2C9_12' class='select'>
                                            <option value='CC'>
                                                C/C
                                            </option>
                                            <option value='CA'>
                                                C/A
                                            </option>
                                            <option value='AA'>
                                                A/A
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_12_checkbox'
                                                   id='CYP2C9_12_checkbox'/><label
                                                for='G12'></label></td>
                                    </tr>

                                    <tr>
                                        <td>449G>A</td>
                                        <td>*8</td>
                                        <td>rs7900194</td>
                                        <td><select size='1' name='CYP2C9_13' class='select'>
                                            <option value='GG'>
                                                G/G
                                            </option>
                                            <option value='GA'>
                                                G/A
                                            </option>
                                            <option value='AA'>
                                                A/A
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_13_checkbox'
                                                   id='CYP2C9_13_checkbox'/><label
                                                for='G13'></label></td>
                                    </tr>

                                    <tr>
                                        <td>752A>G</td>
                                        <td>*9</td>
                                        <td>rs2256871</td>
                                        <td><select size='1' name='CYP2C9_14' class='select'>
                                            <option value='AA'>
                                                A/A
                                            </option>
                                            <option value='AG'>
                                                A/G
                                            </option>
                                            <option value='GG'>
                                                G/G
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_14_checkbox'
                                                   id='CYP2C9_14_checkbox'/><label
                                                for='G14'></label></td>
                                    </tr>

                                    <tr>
                                        <td>815A>G</td>
                                        <td>*10</td>
                                        <td>rs9332130</td>
                                        <td><select size='1' name='CYP2C9_15' class='select'>
                                            <option value='AA'>
                                                A/A
                                            </option>
                                            <option value='AG'>
                                                A/G
                                            </option>
                                            <option value='GG'>
                                                G/G
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_15_checkbox'
                                                   id='CYP2C9_15_checkbox'/><label
                                                for='G15'></label></td>
                                    </tr>

                                    <tr>
                                        <td>1003C>T</td>
                                        <td>*11</td>
                                        <td>rs28371685</td>
                                        <td><select size='1' name='CYP2C9_16' class='select'>
                                            <option value='CC'>
                                                C/C
                                            </option>
                                            <option value='CT'>
                                                C/T
                                            </option>
                                            <option value='TT'>
                                                T/T
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_16_checkbox'
                                                   id='CYP2C9_16_checkbox'/><label
                                                for='G16'></label></td>
                                    </tr>

                                    <tr>
                                        <td>269T>C</td>
                                        <td>*13</td>
                                        <td>rs72558187</td>
                                        <td><select size='1' name='CYP2C9_17' class='select'>
                                            <option value='TT'>
                                                T/T
                                            </option>
                                            <option value='TC'>
                                                T/C
                                            </option>
                                            <option value='CC'>
                                                C/C
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_17_checkbox'
                                                   id='CYP2C9_17_checkbox'/><label
                                                for='G17'></label></td>
                                    </tr>

                                    <tr>
                                        <td>485C>A</td>
                                        <td>*15</td>
                                        <td>rs72558190</td>
                                        <td><select size='1' name='CYP2C9_18' class='select'>
                                            <option value='CC'>
                                                C/C
                                            </option>
                                            <option value='CA'>
                                                C/A
                                            </option>
                                            <option value='AA'>
                                                A/A
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_18_checkbox'
                                                   id='CYP2C9_18_checkbox'/><label
                                                for='G18'></label></td>
                                    </tr>

                                    <tr>
                                        <td>895A>G</td>
                                        <td>*16</td>
                                        <td>rs72558192</td>
                                        <td><select size='1' name='CYP2C9_19' class='select'>
                                            <option value='AA'>
                                                A/A
                                            </option>
                                            <option value='AG'>
                                                A/G
                                            </option>
                                            <option value='GG'>
                                                G/G
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_19_checkbox'
                                                   id='CYP2C9_19_checkbox'/><label
                                                for='G19'></label></td>
                                    </tr>

                                    <tr>
                                        <td>449G>T</td>
                                        <td>*27</td>
                                        <td>rs7900194</td>
                                        <td><select size='1' name='CYP2C9_20' class='select'>
                                            <option value='GG'>
                                                G/G
                                            </option>
                                            <option value='GT'>
                                                G/T
                                            </option>
                                            <option value='TT'>
                                                T/T
                                            </option>
                                        </select></td>
                                        <td><input type='checkbox' class='checkbox2'
                                                   name='CYP2C9_20_checkbox'
                                                   id='CYP2C9_20_checkbox'/><label
                                                for='G20'></label></td>
                                    </tr>
                                    </tr> </table>

                            </div>

                            <label class='showMore' for='_2'>
                                <p>CYP2C19</p>
                                </label><input id='_2' type='checkbox'>
                                <div>

                                    <table>
                                        <tr>
                                            <td>Nucleotide Change</td>
                                            <td>Allele Variant</td>
                                            <td>rs</td>
                                            <td>Genotype</td>
                                            <td>Include in Report</td>
                                        </tr>

                                        <tr>
                                            <td>681G>A</td>
                                            <td>*2</td>
                                            <td>rs4244285</td>
                                            <td><select size='1' name='CYP2C19_21' class='select'>
                                                <option value='GG'>
                                                    G/G
                                                </option>
                                                <option value='GA'>
                                                    G/A
                                                </option>
                                                <option value='AA'>
                                                    A/A
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='CYP2C19_21_checkbox'
                                                       id='CYP2C19_21_checkbox'/><label
                                                    for='G21'></label></td>
                                        </tr>

                                        <tr>
                                            <td>276G>C</td>
                                            <td>*2B</td>
                                            <td>rs17878459</td>
                                            <td><select size='1' name='CYP2C19_22' class='select'>
                                                <option value='GG'>
                                                    G/G
                                                </option>
                                                <option value='GC'>
                                                    G/C
                                                </option>
                                                <option value='CC'>
                                                    C/C
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='CYP2C19_22_checkbox'
                                                       id='CYP2C19_22_checkbox'/><label
                                                    for='G22'></label></td>
                                        </tr>

                                        <tr>
                                            <td>636G>A</td>
                                            <td>*3</td>
                                            <td>rs4986893</td>
                                            <td><select size='1' name='CYP2C19_23' class='select'>
                                                <option value='GG'>
                                                    G/G
                                                </option>
                                                <option value='GA'>
                                                    G/A
                                                </option>
                                                <option value='AA'>
                                                    A/A
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='CYP2C19_23_checkbox'
                                                       id='CYP2C19_23_checkbox'/><label
                                                    for='G23'></label></td>
                                        </tr>

                                        <tr>
                                            <td>1A>G</td>
                                            <td>*4</td>
                                            <td>rs28399504</td>
                                            <td><select size='1' name='CYP2C19_24' class='select'>
                                                <option value='AA'>
                                                    A/A
                                                </option>
                                                <option value='AG'>
                                                    A/G
                                                </option>
                                                <option value='GG'>
                                                    G/G
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='CYP2C19_24_checkbox'
                                                       id='CYP2C19_24_checkbox'/><label
                                                    for='G24'></label></td>
                                        </tr>

                                        <tr>
                                            <td>1297C>T</td>
                                            <td>*5</td>
                                            <td>rs56337013</td>
                                            <td><select size='1' name='CYP2C19_25' class='select'>
                                                <option value='CC'>
                                                    C/C
                                                </option>
                                                <option value='CT'>
                                                    C/T
                                                </option>
                                                <option value='TT'>
                                                    T/T
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='CYP2C19_25_checkbox'
                                                       id='CYP2C19_25_checkbox'/><label
                                                    for='G25'></label></td>
                                        </tr>

                                        <tr>
                                            <td>395G>A</td>
                                            <td>*6</td>
                                            <td>rs72552267</td>
                                            <td><select size='1' name='CYP2C19_26' class='select'>
                                                <option value='GG'>
                                                    G/G
                                                </option>
                                                <option value='GA'>
                                                    G/A
                                                </option>
                                                <option value='AA'>
                                                    A/A
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='CYP2C19_26_checkbox'
                                                       id='CYP2C19_26_checkbox'/><label
                                                    for='G26'></label></td>
                                        </tr>

                                        <tr>
                                            <td>819+2T>A</td>
                                            <td>*7</td>
                                            <td>rs72558186</td>
                                            <td><select size='1' name='CYP2C19_27' class='select'>
                                                <option value='TT'>
                                                    T/T
                                                </option>
                                                <option value='TA'>
                                                    T/A
                                                </option>
                                                <option value='AA'>
                                                    A/A
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='CYP2C19_27_checkbox'
                                                       id='CYP2C19_27_checkbox'/><label
                                                    for='G27'></label></td>
                                        </tr>

                                        <tr>
                                            <td>358T>C</td>
                                            <td>*8</td>
                                            <td>rs41291556</td>
                                            <td><select size='1' name='CYP2C19_28' class='select'>
                                                <option value='TT'>
                                                    T/T
                                                </option>
                                                <option value='TC'>
                                                    T/C
                                                </option>
                                                <option value='CC'>
                                                    C/C
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='CYP2C19_28_checkbox'
                                                       id='CYP2C19_28_checkbox'/><label
                                                    for='G28'></label></td>
                                        </tr>

                                        <tr>
                                            <td>431G>A</td>
                                            <td>*9</td>
                                            <td>rs17884712</td>
                                            <td><select size='1' name='CYP2C19_29' class='select'>
                                                <option value='GG'>
                                                    G/G
                                                </option>
                                                <option value='GA'>
                                                    G/A
                                                </option>
                                                <option value='AA'>
                                                    A/A
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='CYP2C19_29_checkbox'
                                                       id='CYP2C19_29_checkbox'/><label
                                                    for='G29'></label></td>
                                        </tr>

                                        <tr>
                                            <td>680C>T</td>
                                            <td>*10</td>
                                            <td>rs6413438</td>
                                            <td><select size='1' name='CYP2C19_30' class='select'>
                                                <option value='CC'>
                                                    C/C
                                                </option>
                                                <option value='CT'>
                                                    C/T
                                                </option>
                                                <option value='TT'>
                                                    T/T
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='CYP2C19_30_checkbox'
                                                       id='CYP2C19_30_checkbox'/><label
                                                    for='G30'></label></td>
                                        </tr>

                                        <tr>
                                            <td>-806C>T</td>
                                            <td>*17</td>
                                            <td>rs12248560</td>
                                            <td><select size='1' name='CYP2C19_31' class='select'>
                                                <option value='CC'>
                                                    C/C
                                                </option>
                                                <option value='CT'>
                                                    C/T
                                                </option>
                                                <option value='TT'>
                                                    T/T
                                                </option>
                                            </select></td>
                                            <td><input type='checkbox' class='checkbox2'
                                                       name='CYP2C19_31_checkbox'
                                                       id='CYP2C19_31_checkbox'/><label
                                                    for='G31'></label></td>
                                        </tr>
                                        </tr> </table>

                                </div>
                                <label class='showMore' for='_3'>
                                    <p>CYP2D6</p>
                                    </label><input id='_3' type='checkbox'>
                                    <div>

                                        <table>
                                            <tr>
                                                <td>Nucleotide Change</td>
                                                <td>Allele Variant</td>
                                                <td>rs</td>
                                                <td>Genotype</td>
                                                <td>Include in Report</td>
                                            </tr>

                                            <tr>
                                                <td>886C>T</td>
                                                <td>*2</td>
                                                <td>rs16947</td>
                                                <td><select size='1' name='CYP2D6_32' class='select'>
                                                    <option value='CC'>
                                                        C/C
                                                    </option>
                                                    <option value='CT'>
                                                        C/T
                                                    </option>
                                                    <option value='TT'>
                                                        T/T
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_32_checkbox'
                                                           id='CYP2D6_32_checkbox'/><label
                                                        for='G32'></label></td>
                                            </tr>

                                            <tr>
                                                <td>1457G>C</td>
                                                <td>*2</td>
                                                <td>rs1135840</td>
                                                <td><select size='1' name='CYP2D6_33' class='select'>
                                                    <option value='GG'>
                                                        G/G
                                                    </option>
                                                    <option value='GC'>
                                                        G/C
                                                    </option>
                                                    <option value='CC'>
                                                        C/C
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_33_checkbox'
                                                           id='CYP2D6_33_checkbox'/><label
                                                        for='G33'></label></td>
                                            </tr>

                                            <tr>
                                                <td>408G>C</td>
                                                <td>*2A</td>
                                                <td>rs1058164</td>
                                                <td><select size='1' name='CYP2D6_34' class='select'>
                                                    <option value='GG'>
                                                        G/G
                                                    </option>
                                                    <option value='GC'>
                                                        G/C
                                                    </option>
                                                    <option value='CC'>
                                                        C/C
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_34_checkbox'
                                                           id='CYP2D6_34_checkbox'/><label
                                                        for='G34'></label></td>
                                            </tr>

                                            <tr>
                                                <td>775delA</td>
                                                <td>*3</td>
                                                <td>rs35742686</td>
                                                <td><select size='1' name='CYP2D6_35' class='select'>
                                                    <option value='AA'>
                                                        A/A
                                                    </option>
                                                    <option value='A-'>
                                                        A/-
                                                    </option>
                                                    <option value='--'>
                                                        -/-
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_35_checkbox'
                                                           id='CYP2D6_35_checkbox'/><label
                                                        for='G35'></label></td>
                                            </tr>

                                            <tr>
                                                <td>506-1G>A</td>
                                                <td>*4</td>
                                                <td>rs3892097</td>
                                                <td><select size='1' name='CYP2D6_36' class='select'>
                                                    <option value='GG'>
                                                        G/G
                                                    </option>
                                                    <option value='GA'>
                                                        G/A
                                                    </option>
                                                    <option value='AA'>
                                                        A/A
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_36_checkbox'
                                                           id='CYP2D6_36_checkbox'/><label
                                                        for='G36'></label></td>
                                            </tr>

                                            <tr>
                                                <td>454delT</td>
                                                <td>*6</td>
                                                <td>rs5030655</td>
                                                <td><select size='1' name='CYP2D6_37' class='select'>
                                                    <option value='TT'>
                                                        T/T
                                                    </option>
                                                    <option value='T-'>
                                                        T/-
                                                    </option>
                                                    <option value='--'>
                                                        -/-
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_37_checkbox'
                                                           id='CYP2D6_37_checkbox'/><label
                                                        for='G37'></label></td>
                                            </tr>

                                            <tr>
                                                <td>971A>C</td>
                                                <td>*7</td>
                                                <td>rs5030867</td>
                                                <td><select size='1' name='CYP2D6_38' class='select'>
                                                    <option value='AA'>
                                                        A/A
                                                    </option>
                                                    <option value='AC'>
                                                        A/C
                                                    </option>
                                                    <option value='CC'>
                                                        C/C
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_38_checkbox'
                                                           id='CYP2D6_38_checkbox'/><label
                                                        for='G38'></label></td>
                                            </tr>

                                            <tr>
                                                <td>505G>T/A</td>
                                                <td>*8*14</td>
                                                <td>rs5030865</td>
                                                <td><select size='1' name='CYP2D6_39' class='select'>
                                                    <option value='GG'>
                                                        G/G
                                                    </option>
                                                    <option value='GA'>
                                                        G/A
                                                    </option>
                                                    <option value='AA'>
                                                        A/A
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_39_checkbox'
                                                           id='CYP2D6_39_checkbox'/><label
                                                        for='G39'></label></td>
                                            </tr>

                                            <tr>
                                                <td>841_843delAAG</td>
                                                <td>*9</td>
                                                <td>rs5030656</td>
                                                <td><select size='1' name='CYP2D6_40' class='select'>
                                                    <option value='AAGAAG'>
                                                        AAG/AAG
                                                    </option>
                                                    <option value='AAG-'>
                                                        AAG/-
                                                    </option>
                                                    <option value='--'>
                                                        -/-
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_40_checkbox'
                                                           id='CYP2D6_40_checkbox'/><label
                                                        for='G40'></label></td>
                                            </tr>

                                            <tr>
                                                <td>100C>T</td>
                                                <td>*10</td>
                                                <td>rs1065852</td>
                                                <td><select size='1' name='CYP2D6_41' class='select'>
                                                    <option value='CC'>
                                                        C/C
                                                    </option>
                                                    <option value='CT'>
                                                        C/T
                                                    </option>
                                                    <option value='TT'>
                                                        T/T
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_41_checkbox'
                                                           id='CYP2D6_41_checkbox'/><label
                                                        for='G41'></label></td>
                                            </tr>

                                            <tr>
                                                <td>181-1G>C</td>
                                                <td>*11</td>
                                                <td>rs5030863</td>
                                                <td><select size='1' name='CYP2D6_42' class='select'>
                                                    <option value='GG'>
                                                        G/G
                                                    </option>
                                                    <option value='GC'>
                                                        G/C
                                                    </option>
                                                    <option value='CC'>
                                                        C/C
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_42_checkbox'
                                                           id='CYP2D6_42_checkbox'/><label
                                                        for='G42'></label></td>
                                            </tr>

                                            <tr>
                                                <td>124G>A</td>
                                                <td>*12</td>
                                                <td>rs5030862</td>
                                                <td><select size='1' name='CYP2D6_43' class='select'>
                                                    <option value='GG'>
                                                        G/G
                                                    </option>
                                                    <option value='GA'>
                                                        G/A
                                                    </option>
                                                    <option value='AA'>
                                                        A/A
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_43_checkbox'
                                                           id='CYP2D6_43_checkbox'/><label
                                                        for='G43'></label></td>
                                            </tr>

                                            <tr>
                                                <td>137-138insT->T</td>
                                                <td>*15</td>
                                                <td>rs72549357</td>
                                                <td><select size='1' name='CYP2D6_44' class='select'>
                                                    <option value='--'>
                                                        -/-
                                                    </option>
                                                    <option value='-T'>
                                                        -/T
                                                    </option>
                                                    <option value='TT'>
                                                        T/T
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_44_checkbox'
                                                           id='CYP2D6_44_checkbox'/><label
                                                        for='G44'></label></td>
                                            </tr>

                                            <tr>
                                                <td>320C>T</td>
                                                <td>*17</td>
                                                <td>rs28371706</td>
                                                <td><select size='1' name='CYP2D6_45' class='select'>
                                                    <option value='CC'>
                                                        C/C
                                                    </option>
                                                    <option value='CT'>
                                                        C/T
                                                    </option>
                                                    <option value='TT'>
                                                        T/T
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_45_checkbox'
                                                           id='CYP2D6_45_checkbox'/><label
                                                        for='G45'></label></td>
                                            </tr>

                                            <tr>
                                                <td>1973_1974insG->G</td>
                                                <td>*20</td>
                                                <td>rs72549354</td>
                                                <td><select size='1' name='CYP2D6_46' class='select'>
                                                    <option value='--'>
                                                        -/-
                                                    </option>
                                                    <option value='-G'>
                                                        -/G
                                                    </option>
                                                    <option value='GG'>
                                                        G/G
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_46_checkbox'
                                                           id='CYP2D6_46_checkbox'/><label
                                                        for='G46'></label></td>
                                            </tr>

                                            <tr>
                                                <td>1012G>A</td>
                                                <td>*29</td>
                                                <td>rs59421388</td>
                                                <td><select size='1' name='CYP2D6_47' class='select'>
                                                    <option value='GG'>
                                                        G/G
                                                    </option>
                                                    <option value='GA'>
                                                        G/A
                                                    </option>
                                                    <option value='AA'>
                                                        A/A
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_47_checkbox'
                                                           id='CYP2D6_47_checkbox'/><label
                                                        for='G47'></label></td>
                                            </tr>

                                            <tr>
                                                <td>406G>A</td>
                                                <td>*29*70</td>
                                                <td>rs61736512</td>
                                                <td><select size='1' name='CYP2D6_48' class='select'>
                                                    <option value='GG'>
                                                        G/G
                                                    </option>
                                                    <option value='GA'>
                                                        G/A
                                                    </option>
                                                    <option value='AA'>
                                                        A/A
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_48_checkbox'
                                                           id='CYP2D6_48_checkbox'/><label
                                                        for='G48'></label></td>
                                            </tr>

                                            <tr>
                                                <td>31G>A</td>
                                                <td>*35</td>
                                                <td>rs769258</td>
                                                <td><select size='1' name='CYP2D6_49' class='select'>
                                                    <option value='GG'>
                                                        G/G
                                                    </option>
                                                    <option value='GA'>
                                                        G/A
                                                    </option>
                                                    <option value='AA'>
                                                        A/A
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_49_checkbox'
                                                           id='CYP2D6_49_checkbox'/><label
                                                        for='G49'></label></td>
                                            </tr>

                                            <tr>
                                                <td>Sing-dup</td>
                                                <td>*36</td>
                                                <td>Gene conversion to CYP2D7 in exon 9</td>
                                                <td><select size='1' name='CYP2D6_50' class='select'>
                                                    <option value='--'>
                                                        -/-
                                                    </option>
                                                    <option value='-Dup'>
                                                        -/Dup
                                                    </option>
                                                    <option value='DupDup'>
                                                        Dup/Dup
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_50_checkbox'
                                                           id='CYP2D6_50_checkbox'/><label
                                                        for='G50'></label></td>
                                            </tr>

                                            <tr>
                                                <td>985+39G>A</td>
                                                <td>*41</td>
                                                <td>rs28371725</td>
                                                <td><select size='1' name='CYP2D6_51' class='select'>
                                                    <option value='GG'>
                                                        G/G
                                                    </option>
                                                    <option value='GA'>
                                                        G/A
                                                    </option>
                                                    <option value='AA'>
                                                        A/A
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_51_checkbox'
                                                           id='CYP2D6_51_checkbox'/><label
                                                        for='G51'></label></td>
                                            </tr>

                                            <tr>
                                                <td>CNV assay</td>
                                                <td>*5/XN</td>
                                                <td>Del/duplication</td>
                                                <td><select size='1' name='CYP2D6_52' class='select'>
                                                    <option value='22'>
                                                        2/2
                                                    </option>
                                                    <option value='23'>
                                                        2/3
                                                    </option>
                                                    <option value='33'>
                                                        3/3
                                                    </option>
                                                </select></td>
                                                <td><input type='checkbox' class='checkbox2'
                                                           name='CYP2D6_52_checkbox'
                                                           id='CYP2D6_52_checkbox'/><label
                                                        for='G52'></label></td>
                                            </tr>
                                            </tr> </table>

                                    </div>

                                    <label class='showMore' for='_4'>
                                        <p>CYP2A6</p>
                                        </label><input id='_4' type='checkbox'>
                                        <div>

                                            <table>
                                                <tr>
                                                    <td>Nucleotide Change</td>
                                                    <td>Allele Variant</td>
                                                    <td>rs</td>
                                                    <td>Genotype</td>
                                                    <td>Include in Report</td>
                                                </tr>

                                                <tr>
                                                    <td>479T>A</td>
                                                    <td>*2</td>
                                                    <td>rs1801272</td>
                                                    <td><select size='1' name='CYP2A6_53' class='select'>
                                                        <option value='TT'>
                                                            T/T
                                                        </option>
                                                        <option value='TA'>
                                                            T/A
                                                        </option>
                                                        <option value='AA'>
                                                            A/A
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='CYP2A6_53_checkbox'
                                                               id='CYP2A6_53_checkbox'/><label
                                                            for='G53'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1283G>T</td>
                                                    <td>*5</td>
                                                    <td>rs5031017</td>
                                                    <td><select size='1' name='CYP2A6_54' class='select'>
                                                        <option value='GG'>
                                                            G/G
                                                        </option>
                                                        <option value='GT'>
                                                            G/T
                                                        </option>
                                                        <option value='TT'>
                                                            T/T
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='CYP2A6_54_checkbox'
                                                               id='CYP2A6_54_checkbox'/><label
                                                            for='G54'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>383G>A</td>
                                                    <td>*6</td>
                                                    <td>rs4986891</td>
                                                    <td><select size='1' name='CYP2A6_55' class='select'>
                                                        <option value='GG'>
                                                            G/G
                                                        </option>
                                                        <option value='GA'>
                                                            G/A
                                                        </option>
                                                        <option value='AA'>
                                                            A/A
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='CYP2A6_55_checkbox'
                                                               id='CYP2A6_55_checkbox'/><label
                                                            for='G55'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1412T>C</td>
                                                    <td>*7</td>
                                                    <td>rs5031016</td>
                                                    <td><select size='1' name='CYP2A6_56' class='select'>
                                                        <option value='TT'>
                                                            T/T
                                                        </option>
                                                        <option value='TC'>
                                                            T/C
                                                        </option>
                                                        <option value='CC'>
                                                            C/C
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='CYP2A6_56_checkbox'
                                                               id='CYP2A6_56_checkbox'/><label
                                                            for='G56'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>-48T>G</td>
                                                    <td>*9</td>
                                                    <td>rs28399433</td>
                                                    <td><select size='1' name='CYP2A6_57' class='select'>
                                                        <option value='TT'>
                                                            T/T
                                                        </option>
                                                        <option value='TG'>
                                                            T/G
                                                        </option>
                                                        <option value='GG'>
                                                            G/G
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='CYP2A6_57_checkbox'
                                                               id='CYP2A6_57_checkbox'/><label
                                                            for='G57'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1093G>A</td>
                                                    <td>*17</td>
                                                    <td>rs28399454</td>
                                                    <td><select size='1' name='CYP2A6_58' class='select'>
                                                        <option value='GG'>
                                                            G/G
                                                        </option>
                                                        <option value='GA'>
                                                            G/A
                                                        </option>
                                                        <option value='AA'>
                                                            A/A
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='CYP2A6_58_checkbox'
                                                               id='CYP2A6_58_checkbox'/><label
                                                            for='G58'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1175A>T</td>
                                                    <td>*18</td>
                                                    <td>rs1809810</td>
                                                    <td><select size='1' name='CYP2A6_59' class='select'>
                                                        <option value='AA'>
                                                            A/A
                                                        </option>
                                                        <option value='AT'>
                                                            A/T
                                                        </option>
                                                        <option value='TT'>
                                                            T/T
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='CYP2A6_59_checkbox'
                                                               id='CYP2A6_59_checkbox'/><label
                                                            for='G59'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1427A>G</td>
                                                    <td>*21</td>
                                                    <td>rs6413474</td>
                                                    <td><select size='1' name='CYP2A6_60' class='select'>
                                                        <option value='AA'>
                                                            A/A
                                                        </option>
                                                        <option value='AG'>
                                                            A/G
                                                        </option>
                                                        <option value='GG'>
                                                            G/G
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='CYP2A6_60_checkbox'
                                                               id='CYP2A6_60_checkbox'/><label
                                                            for='G60'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>607C>T</td>
                                                    <td>*23</td>
                                                    <td>rs56256500</td>
                                                    <td><select size='1' name='CYP2A6_61' class='select'>
                                                        <option value='CC'>
                                                            C/C
                                                        </option>
                                                        <option value='CT'>
                                                            C/T
                                                        </option>
                                                        <option value='TT'>
                                                            T/T
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='CYP2A6_61_checkbox'
                                                               id='CYP2A6_61_checkbox'/><label
                                                            for='G61'></label></td>
                                                </tr>

                                                <tr>
                                                    <td>1312A>T</td>
                                                    <td>*35</td>
                                                    <td>rs143731390</td>
                                                    <td><select size='1' name='CYP2A6_62' class='select'>
                                                        <option value='AA'>
                                                            A/A
                                                        </option>
                                                        <option value='AT'>
                                                            A/T
                                                        </option>
                                                        <option value='TT'>
                                                            T/T
                                                        </option>
                                                    </select></td>
                                                    <td><input type='checkbox' class='checkbox2'
                                                               name='CYP2A6_62_checkbox'
                                                               id='CYP2A6_62_checkbox'/><label
                                                            for='G62'></label></td>
                                                </tr>
                                                </tr> </table>

                                        </div>

                                        <label class='showMore' for='_5'>
                                            <p>CYP2B6</p>
                                            </label><input id='_5' type='checkbox'>
                                            <div>

                                                <table>
                                                    <tr>
                                                        <td>Nucleotide Change</td>
                                                        <td>Allele Variant</td>
                                                        <td>rs</td>
                                                        <td>Genotype</td>
                                                        <td>Include in Report</td>
                                                    </tr>

                                                    <tr>
                                                        <td>785A>G</td>
                                                        <td>*4</td>
                                                        <td>rs2279343</td>
                                                        <td><select size='1' name='CYP2B6_63' class='select'>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                            <option value='AG'>
                                                                A/G
                                                            </option>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='CYP2B6_63_checkbox'
                                                                   id='CYP2B6_63_checkbox'/><label
                                                                for='G63'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>516G>T</td>
                                                        <td>*6</td>
                                                        <td>rs3745274</td>
                                                        <td><select size='1' name='CYP2B6_64' class='select'>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                            <option value='GT'>
                                                                G/T
                                                            </option>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='CYP2B6_64_checkbox'
                                                                   id='CYP2B6_64_checkbox'/><label
                                                                for='G64'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>415A>G</td>
                                                        <td>*8</td>
                                                        <td>rs12721655</td>
                                                        <td><select size='1' name='CYP2B6_65' class='select'>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                            <option value='AG'>
                                                                A/G
                                                            </option>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='CYP2B6_65_checkbox'
                                                                   id='CYP2B6_65_checkbox'/><label
                                                                for='G65'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>136A>G</td>
                                                        <td>*11</td>
                                                        <td>rs35303484</td>
                                                        <td><select size='1' name='CYP2B6_66' class='select'>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                            <option value='AG'>
                                                                A/G
                                                            </option>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='CYP2B6_66_checkbox'
                                                                   id='CYP2B6_66_checkbox'/><label
                                                                for='G66'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>296G>A</td>
                                                        <td>*12</td>
                                                        <td>rs36060847</td>
                                                        <td><select size='1' name='CYP2B6_67' class='select'>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                            <option value='GA'>
                                                                G/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='CYP2B6_67_checkbox'
                                                                   id='CYP2B6_67_checkbox'/><label
                                                                for='G67'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>1172T>A</td>
                                                        <td>*15</td>
                                                        <td>rs35979566</td>
                                                        <td><select size='1' name='CYP2B6_68' class='select'>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                            <option value='TA'>
                                                                T/A
                                                            </option>
                                                            <option value='AA'>
                                                                A/A
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='CYP2B6_68_checkbox'
                                                                   id='CYP2B6_68_checkbox'/><label
                                                                for='G68'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>I983T>C</td>
                                                        <td>*18</td>
                                                        <td>rs28399499</td>
                                                        <td><select size='1' name='CYP2B6_69' class='select'>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                            <option value='TC'>
                                                                T/C
                                                            </option>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='CYP2B6_69_checkbox'
                                                                   id='CYP2B6_69_checkbox'/><label
                                                                for='G69'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>-82T>C</td>
                                                        <td>*22</td>
                                                        <td>rs34223104</td>
                                                        <td><select size='1' name='CYP2B6_70' class='select'>
                                                            <option value='TT'>
                                                                T/T
                                                            </option>
                                                            <option value='TC'>
                                                                T/C
                                                            </option>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='CYP2B6_70_checkbox'
                                                                   id='CYP2B6_70_checkbox'/><label
                                                                for='G70'></label></td>
                                                    </tr>

                                                    <tr>
                                                        <td>499C>G</td>
                                                        <td>*26</td>
                                                        <td>rs3826711</td>
                                                        <td><select size='1' name='CYP2B6_71' class='select'>
                                                            <option value='CC'>
                                                                C/C
                                                            </option>
                                                            <option value='CG'>
                                                                C/G
                                                            </option>
                                                            <option value='GG'>
                                                                G/G
                                                            </option>
                                                        </select></td>
                                                        <td><input type='checkbox' class='checkbox2'
                                                                   name='CYP2B6_71_checkbox'
                                                                   id='CYP2B6_71_checkbox'/><label
                                                                for='G71'></label></td>
                                                    </tr>
                                                    </tr> </table>

                                            </div>

                                            <label class='showMore' for='_6'>
                                                <p>CYP2C8</p>
                                                </label><input id='_6' type='checkbox'>
                                                <div>

                                                    <table>
                                                        <tr>
                                                            <td>Nucleotide Change</td>
                                                            <td>Allele Variant</td>
                                                            <td>rs</td>
                                                            <td>Genotype</td>
                                                            <td>Include in Report</td>
                                                        </tr>

                                                        <tr>
                                                            <td>805A>T</td>
                                                            <td>*2</td>
                                                            <td>rs11572103</td>
                                                            <td><select size='1' name='CYP2C8_72' class='select'>
                                                                <option value='AA'>
                                                                    A/A
                                                                </option>
                                                                <option value='AT'>
                                                                    A/T
                                                                </option>
                                                                <option value='TT'>
                                                                    T/T
                                                                </option>
                                                            </select></td>
                                                            <td><input type='checkbox' class='checkbox2'
                                                                       name='CYP2C8_72_checkbox'
                                                                       id='CYP2C8_72_checkbox'/><label
                                                                    for='G72'></label></td>
                                                        </tr>

                                                        <tr>
                                                            <td>416G>A</td>
                                                            <td>*3</td>
                                                            <td>rs11572080</td>
                                                            <td><select size='1' name='CYP2C8_73' class='select'>
                                                                <option value='GG'>
                                                                    G/G
                                                                </option>
                                                                <option value='GA'>
                                                                    G/A
                                                                </option>
                                                                <option value='AA'>
                                                                    A/A
                                                                </option>
                                                            </select></td>
                                                            <td><input type='checkbox' class='checkbox2'
                                                                       name='CYP2C8_73_checkbox'
                                                                       id='CYP2C8_73_checkbox'/><label
                                                                    for='G73'></label></td>
                                                        </tr>

                                                        <tr>
                                                            <td>1196A>G</td>
                                                            <td>*3</td>
                                                            <td>rs10509681</td>
                                                            <td><select size='1' name='CYP2C8_74' class='select'>
                                                                <option value='AA'>
                                                                    A/A
                                                                </option>
                                                                <option value='AG'>
                                                                    A/G
                                                                </option>
                                                                <option value='GG'>
                                                                    G/G
                                                                </option>
                                                            </select></td>
                                                            <td><input type='checkbox' class='checkbox2'
                                                                       name='CYP2C8_74_checkbox'
                                                                       id='CYP2C8_74_checkbox'/><label
                                                                    for='G74'></label></td>
                                                        </tr>

                                                        <tr>
                                                            <td>792C>G</td>
                                                            <td>*4</td>
                                                            <td>rs1058930</td>
                                                            <td><select size='1' name='CYP2C8_75' class='select'>
                                                                <option value='CC'>
                                                                    C/C
                                                                </option>
                                                                <option value='CG'>
                                                                    C/G
                                                                </option>
                                                                <option value='GG'>
                                                                    G/G
                                                                </option>
                                                            </select></td>
                                                            <td><input type='checkbox' class='checkbox2'
                                                                       name='CYP2C8_75_checkbox'
                                                                       id='CYP2C8_75_checkbox'/><label
                                                                    for='G75'></label></td>
                                                        </tr>
                                                        </tr> </table>

                                                </div>

                                                <label class='showMore' for='_7'>
                                                    <p>CYP2E1</p>
                                                    </label><input id='_7' type='checkbox'>
                                                    <div>

                                                        <table>
                                                            <tr>
                                                                <td>Nucleotide Change</td>
                                                                <td>Allele Variant</td>
                                                                <td>rs</td>
                                                                <td>Genotype</td>
                                                                <td>Include in Report</td>
                                                            </tr>

                                                            <tr>
                                                                <td>227G>A</td>
                                                                <td>*2</td>
                                                                <td>rs72559710</td>
                                                                <td><select size='1' name='CYP2E1_76' class='select'>
                                                                    <option value='GG'>
                                                                        G/G
                                                                    </option>
                                                                    <option value='GA'>
                                                                        G/A
                                                                    </option>
                                                                    <option value='AA'>
                                                                        A/A
                                                                    </option>
                                                                </select></td>
                                                                <td><input type='checkbox' class='checkbox2'
                                                                           name='CYP2E1_76_checkbox'
                                                                           id='CYP2E1_76_checkbox'/><label
                                                                        for='G76'></label></td>
                                                            </tr>

                                                            <tr>
                                                                <td>535G>A</td>
                                                                <td>*4</td>
                                                                <td>rs6413419</td>
                                                                <td><select size='1' name='CYP2E1_77' class='select'>
                                                                    <option value='GG'>
                                                                        G/G
                                                                    </option>
                                                                    <option value='GA'>
                                                                        G/A
                                                                    </option>
                                                                    <option value='AA'>
                                                                        A/A
                                                                    </option>
                                                                </select></td>
                                                                <td><input type='checkbox' class='checkbox2'
                                                                           name='CYP2E1_77_checkbox'
                                                                           id='CYP2E1_77_checkbox'/><label
                                                                        for='G77'></label></td>
                                                            </tr>
                                                            </tr> </table>

                                                    </div>

                                                    <label class='showMore' for='_8'>
                                                        <p>CYP2J2</p>
                                                        </label><input id='_8' type='checkbox'>
                                                        <div>

                                                            <table>
                                                                <tr>
                                                                    <td>Nucleotide Change</td>
                                                                    <td>Allele Variant</td>
                                                                    <td>rs</td>
                                                                    <td>Genotype</td>
                                                                    <td>Include in Report</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>-76G>T</td>
                                                                    <td>*7</td>
                                                                    <td>rs890293</td>
                                                                    <td><select size='1' name='CYP2J2_78' class='select'>
                                                                        <option value='GG'>
                                                                            G/G
                                                                        </option>
                                                                        <option value='GT'>
                                                                            G/T
                                                                        </option>
                                                                        <option value='TT'>
                                                                            T/T
                                                                        </option>
                                                                    </select></td>
                                                                    <td><input type='checkbox' class='checkbox2'
                                                                               name='CYP2J2_78_checkbox'
                                                                               id='CYP2J2_78_checkbox'/><label
                                                                            for='G78'></label></td>
                                                                </tr>
                                                                </tr> </table>

                                                        </div>

                                                        <label class='showMore' for='_9'>
                                                            <p>CYP3A4</p>
                                                            </label><input id='_9' type='checkbox'>
                                                            <div>

                                                                <table>
                                                                    <tr>
                                                                        <td>Nucleotide Change</td>
                                                                        <td>Allele Variant</td>
                                                                        <td>rs</td>
                                                                        <td>Genotype</td>
                                                                        <td>Include in Report</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>-392G>A</td>
                                                                        <td>*1B</td>
                                                                        <td>rs2740574</td>
                                                                        <td><select size='1' name='CYP3A4_79' class='select'>
                                                                            <option value='GG'>
                                                                                G/G
                                                                            </option>
                                                                            <option value='GA'>
                                                                                G/A
                                                                            </option>
                                                                            <option value='AA'>
                                                                                A/A
                                                                            </option>
                                                                        </select></td>
                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                   name='CYP3A4_79_checkbox'
                                                                                   id='CYP3A4_79_checkbox'/><label
                                                                                for='G79'></label></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>1334T>C</td>
                                                                        <td>*3</td>
                                                                        <td>rs4986910</td>
                                                                        <td><select size='1' name='CYP3A4_80' class='select'>
                                                                            <option value='TT'>
                                                                                T/T
                                                                            </option>
                                                                            <option value='TC'>
                                                                                T/C
                                                                            </option>
                                                                            <option value='CC'>
                                                                                C/C
                                                                            </option>
                                                                        </select></td>
                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                   name='CYP3A4_80_checkbox'
                                                                                   id='CYP3A4_80_checkbox'/><label
                                                                                for='G80'></label></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>389G>A</td>
                                                                        <td>*8</td>
                                                                        <td>rs72552799</td>
                                                                        <td><select size='1' name='CYP3A4_81' class='select'>
                                                                            <option value='GG'>
                                                                                G/G
                                                                            </option>
                                                                            <option value='GA'>
                                                                                G/A
                                                                            </option>
                                                                            <option value='AA'>
                                                                                A/A
                                                                            </option>
                                                                        </select></td>
                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                   name='CYP3A4_81_checkbox'
                                                                                   id='CYP3A4_81_checkbox'/><label
                                                                                for='G81'></label></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>1117C>T</td>
                                                                        <td>*12</td>
                                                                        <td>rs12721629</td>
                                                                        <td><select size='1' name='CYP3A4_82' class='select'>
                                                                            <option value='CC'>
                                                                                C/C
                                                                            </option>
                                                                            <option value='CT'>
                                                                                C/T
                                                                            </option>
                                                                            <option value='TT'>
                                                                                T/T
                                                                            </option>
                                                                        </select></td>
                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                   name='CYP3A4_82_checkbox'
                                                                                   id='CYP3A4_82_checkbox'/><label
                                                                                for='G82'></label></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>1247C>T</td>
                                                                        <td>*13</td>
                                                                        <td>rs4986909</td>
                                                                        <td><select size='1' name='CYP3A4_83' class='select'>
                                                                            <option value='CC'>
                                                                                C/C
                                                                            </option>
                                                                            <option value='CT'>
                                                                                C/T
                                                                            </option>
                                                                            <option value='TT'>
                                                                                T/T
                                                                            </option>
                                                                        </select></td>
                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                   name='CYP3A4_83_checkbox'
                                                                                   id='CYP3A4_83_checkbox'/><label
                                                                                for='G83'></label></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>566T>C</td>
                                                                        <td>*17</td>
                                                                        <td>rs4987161</td>
                                                                        <td><select size='1' name='CYP3A4_84' class='select'>
                                                                            <option value='TT'>
                                                                                T/T
                                                                            </option>
                                                                            <option value='TC'>
                                                                                T/C
                                                                            </option>
                                                                            <option value='CC'>
                                                                                C/C
                                                                            </option>
                                                                        </select></td>
                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                   name='CYP3A4_84_checkbox'
                                                                                   id='CYP3A4_84_checkbox'/><label
                                                                                for='G84'></label></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>878T>C</td>
                                                                        <td>*18</td>
                                                                        <td>rs28371759</td>
                                                                        <td><select size='1' name='CYP3A4_85' class='select'>
                                                                            <option value='TT'>
                                                                                T/T
                                                                            </option>
                                                                            <option value='TC'>
                                                                                T/C
                                                                            </option>
                                                                            <option value='CC'>
                                                                                C/C
                                                                            </option>
                                                                        </select></td>
                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                   name='CYP3A4_85_checkbox'
                                                                                   id='CYP3A4_85_checkbox'/><label
                                                                                for='G85'></label></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>522-191C>T</td>
                                                                        <td>*22</td>
                                                                        <td>rs35599367</td>
                                                                        <td><select size='1' name='CYP3A4_86' class='select'>
                                                                            <option value='CC'>
                                                                                C/C
                                                                            </option>
                                                                            <option value='CT'>
                                                                                C/T
                                                                            </option>
                                                                            <option value='TT'>
                                                                                T/T
                                                                            </option>
                                                                        </select></td>
                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                   name='CYP3A4_86_checkbox'
                                                                                   id='CYP3A4_86_checkbox'/><label
                                                                                for='G86'></label></td>
                                                                    </tr>
                                                                    </tr> </table>

                                                            </div>

                                                            <label class='showMore' for='_10'>
                                                                <p>CYP3A5</p>
                                                                </label><input id='_10' type='checkbox'>
                                                                <div>

                                                                    <table>
                                                                        <tr>
                                                                            <td>Nucleotide Change</td>
                                                                            <td>Allele Variant</td>
                                                                            <td>rs</td>
                                                                            <td>Genotype</td>
                                                                            <td>Include in Report</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>1193C>A</td>
                                                                            <td>*2</td>
                                                                            <td>rs28365083</td>
                                                                            <td><select size='1' name='CYP3A5_87' class='select'>
                                                                                <option value='CC'>
                                                                                    C/C
                                                                                </option>
                                                                                <option value='CA'>
                                                                                    C/A
                                                                                </option>
                                                                                <option value='AA'>
                                                                                    A/A
                                                                                </option>
                                                                            </select></td>
                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                       name='CYP3A5_87_checkbox'
                                                                                       id='CYP3A5_87_checkbox'/><label
                                                                                    for='G87'></label></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>689-1G>A</td>
                                                                            <td>*3</td>
                                                                            <td>rs776746</td>
                                                                            <td><select size='1' name='CYP3A5_88' class='select'>
                                                                                <option value='GG'>
                                                                                    G/G
                                                                                </option>
                                                                                <option value='GA'>
                                                                                    G/A
                                                                                </option>
                                                                                <option value='AA'>
                                                                                    A/A
                                                                                </option>
                                                                            </select></td>
                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                       name='CYP3A5_88_checkbox'
                                                                                       id='CYP3A5_88_checkbox'/><label
                                                                                    for='G88'></label></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>58C>T</td>
                                                                            <td>*3A</td>
                                                                            <td>rs28383468</td>
                                                                            <td><select size='1' name='CYP3A5_89' class='select'>
                                                                                <option value='CC'>
                                                                                    C/C
                                                                                </option>
                                                                                <option value='CT'>
                                                                                    C/T
                                                                                </option>
                                                                                <option value='TT'>
                                                                                    T/T
                                                                                </option>
                                                                            </select></td>
                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                       name='CYP3A5_89_checkbox'
                                                                                       id='CYP3A5_89_checkbox'/><label
                                                                                    for='G89'></label></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>92_93insG->G</td>
                                                                            <td>*3B</td>
                                                                            <td>rs200579169</td>
                                                                            <td><select size='1' name='CYP3A5_90' class='select'>
                                                                                <option value='--'>
                                                                                    -/-
                                                                                </option>
                                                                                <option value='-G'>
                                                                                    -/G
                                                                                </option>
                                                                                <option value='GG'>
                                                                                    G/G
                                                                                </option>
                                                                            </select></td>
                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                       name='CYP3A5_90_checkbox'
                                                                                       id='CYP3A5_90_checkbox'/><label
                                                                                    for='G90'></label></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>*14T>C</td>
                                                                            <td>*3</td>
                                                                            <td>rs15524</td>
                                                                            <td><select size='1' name='CYP3A5_91' class='select'>
                                                                                <option value='TT'>
                                                                                    T/T
                                                                                </option>
                                                                                <option value='TC'>
                                                                                    T/C
                                                                                </option>
                                                                                <option value='CC'>
                                                                                    C/C
                                                                                </option>
                                                                            </select></td>
                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                       name='CYP3A5_91_checkbox'
                                                                                       id='CYP3A5_91_checkbox'/><label
                                                                                    for='G91'></label></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>624G>A</td>
                                                                            <td>*6</td>
                                                                            <td>rs10264272</td>
                                                                            <td><select size='1' name='CYP3A5_92' class='select'>
                                                                                <option value='GG'>
                                                                                    G/G
                                                                                </option>
                                                                                <option value='GA'>
                                                                                    G/A
                                                                                </option>
                                                                                <option value='AA'>
                                                                                    A/A
                                                                                </option>
                                                                            </select></td>
                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                       name='CYP3A5_92_checkbox'
                                                                                       id='CYP3A5_92_checkbox'/><label
                                                                                    for='G92'></label></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>1035_1036insT</td>
                                                                            <td>*7</td>
                                                                            <td>rs41303343</td>
                                                                            <td><select size='1' name='CYP3A5_93' class='select'>
                                                                                <option value='--'>
                                                                                    -/-
                                                                                </option>
                                                                                <option value='-T'>
                                                                                    -/T
                                                                                </option>
                                                                                <option value='TT'>
                                                                                    T/T
                                                                                </option>
                                                                            </select></td>
                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                       name='CYP3A5_93_checkbox'
                                                                                       id='CYP3A5_93_checkbox'/><label
                                                                                    for='G93'></label></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>82C>T</td>
                                                                            <td>*8</td>
                                                                            <td>rs55817950</td>
                                                                            <td><select size='1' name='CYP3A5_94' class='select'>
                                                                                <option value='CC'>
                                                                                    C/C
                                                                                </option>
                                                                                <option value='CT'>
                                                                                    C/T
                                                                                </option>
                                                                                <option value='TT'>
                                                                                    T/T
                                                                                </option>
                                                                            </select></td>
                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                       name='CYP3A5_94_checkbox'
                                                                                       id='CYP3A5_94_checkbox'/><label
                                                                                    for='G94'></label></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>1009G>A</td>
                                                                            <td>*9</td>
                                                                            <td>rs28383479</td>
                                                                            <td><select size='1' name='CYP3A5_95' class='select'>
                                                                                <option value='GG'>
                                                                                    G/G
                                                                                </option>
                                                                                <option value='GA'>
                                                                                    G/A
                                                                                </option>
                                                                                <option value='AA'>
                                                                                    A/A
                                                                                </option>
                                                                            </select></td>
                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                       name='CYP3A5_95_checkbox'
                                                                                       id='CYP3A5_95_checkbox'/><label
                                                                                    for='G95'></label></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>1337T>C</td>
                                                                            <td>*3K</td>
                                                                            <td>rs41279854</td>
                                                                            <td><select size='1' name='CYP3A5_96' class='select'>
                                                                                <option value='TT'>
                                                                                    T/T
                                                                                </option>
                                                                                <option value='TC'>
                                                                                    T/C
                                                                                </option>
                                                                                <option value='CC'>
                                                                                    C/C
                                                                                </option>
                                                                            </select></td>
                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                       name='CYP3A5_96_checkbox'
                                                                                       id='CYP3A5_96_checkbox'/><label
                                                                                    for='G96'></label></td>
                                                                        </tr>
                                                                        </tr> </table>

                                                                </div>

                                                                <label class='showMore' for='_11'>
                                                                    <p>CYP4F2</p>
                                                                    </label><input id='_11' type='checkbox'>
                                                                    <div>

                                                                        <table>
                                                                            <tr>
                                                                                <td>Nucleotide Change</td>
                                                                                <td>Allele Variant</td>
                                                                                <td>rs</td>
                                                                                <td>Genotype</td>
                                                                                <td>Include in Report</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td>34T>G</td>
                                                                                <td>*2</td>
                                                                                <td>rs3093105</td>
                                                                                <td><select size='1' name='CYP4F2_97' class='select'>
                                                                                    <option value='TT'>
                                                                                        T/T
                                                                                    </option>
                                                                                    <option value='TG'>
                                                                                        T/G
                                                                                    </option>
                                                                                    <option value='GG'>
                                                                                        G/G
                                                                                    </option>
                                                                                </select></td>
                                                                                <td><input type='checkbox' class='checkbox2'
                                                                                           name='CYP4F2_97_checkbox'
                                                                                           id='CYP4F2_97_checkbox'/><label
                                                                                        for='G97'></label></td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td>1297G>A</td>
                                                                                <td>*3</td>
                                                                                <td>rs2108622</td>
                                                                                <td><select size='1' name='CYP4F2_98' class='select'>
                                                                                    <option value='GG'>
                                                                                        G/G
                                                                                    </option>
                                                                                    <option value='GA'>
                                                                                        G/A
                                                                                    </option>
                                                                                    <option value='AA'>
                                                                                        A/A
                                                                                    </option>
                                                                                </select></td>
                                                                                <td><input type='checkbox' class='checkbox2'
                                                                                           name='CYP4F2_98_checkbox'
                                                                                           id='CYP4F2_98_checkbox'/><label
                                                                                        for='G98'></label></td>
                                                                            </tr>
                                                                            </tr> </table>

                                                                    </div>

                                                                    <label class='showMore' for='_22'>
                                                                        <p>UGT1A1</p>
                                                                        </label><input id='_22' type='checkbox'>
                                                                        <div>

                                                                            <table>
                                                                                <tr>
                                                                                    <td>Nucleotide Change</td>
                                                                                    <td>Allele Variant</td>
                                                                                    <td>rs</td>
                                                                                    <td>Genotype</td>
                                                                                    <td>Include in Report</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>211G>A</td>
                                                                                    <td>*6</td>
                                                                                    <td>rs4148323</td>
                                                                                    <td><select size='1' name='UGT1A1_132' class='select'>
                                                                                        <option value='GG'>
                                                                                            G/G
                                                                                        </option>
                                                                                        <option value='GA'>
                                                                                            G/A
                                                                                        </option>
                                                                                        <option value='AA'>
                                                                                            A/A
                                                                                        </option>
                                                                                    </select></td>
                                                                                    <td><input type='checkbox' class='checkbox2'
                                                                                               name='UGT1A1_132_checkbox'
                                                                                               id='UGT1A1_132_checkbox'/><label
                                                                                            for='G132'></label></td>
                                                                                </tr>
                                                                                </tr> </table>

                                                                        </div>

                                                                        <label class='showMore' for='_23'>
                                                                            <p>UGT1A4</p>
                                                                            </label><input id='_23' type='checkbox'>
                                                                            <div>

                                                                                <table>
                                                                                    <tr>
                                                                                        <td>Nucleotide Change</td>
                                                                                        <td>Allele Variant</td>
                                                                                        <td>rs</td>
                                                                                        <td>Genotype</td>
                                                                                        <td>Include in Report</td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td>70C>A</td>
                                                                                        <td>*2</td>
                                                                                        <td>rs1799807</td>
                                                                                        <td><select size='1' name='UGT1A4_133' class='select'>
                                                                                            <option value='CC'>
                                                                                                C/C
                                                                                            </option>
                                                                                            <option value='CA'>
                                                                                                C/A
                                                                                            </option>
                                                                                            <option value='AA'>
                                                                                                A/A
                                                                                            </option>
                                                                                        </select></td>
                                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                                   name='UGT1A4_133_checkbox'
                                                                                                   id='UGT1A4_133_checkbox'/><label
                                                                                                for='G133'></label></td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td>142T>G</td>
                                                                                        <td>*3</td>
                                                                                        <td>rs2011425</td>
                                                                                        <td><select size='1' name='UGT1A4_134' class='select'>
                                                                                            <option value='TT'>
                                                                                                T/T
                                                                                            </option>
                                                                                            <option value='TG'>
                                                                                                T/G
                                                                                            </option>
                                                                                            <option value='GG'>
                                                                                                G/G
                                                                                            </option>
                                                                                        </select></td>
                                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                                   name='UGT1A4_134_checkbox'
                                                                                                   id='UGT1A4_134_checkbox'/><label
                                                                                                for='G134'></label></td>
                                                                                    </tr>
                                                                                    </tr> </table>

                                                                            </div>

                                                                            <label class='showMore' for='_24'>
                                                                                <p>UGT1A6</p>
                                                                                </label><input id='_24' type='checkbox'>
                                                                                <div>

                                                                                    <table>
                                                                                        <tr>
                                                                                            <td>Nucleotide Change</td>
                                                                                            <td>Allele Variant</td>
                                                                                            <td>rs</td>
                                                                                            <td>Genotype</td>
                                                                                            <td>Include in Report</td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>19T>G</td>
                                                                                            <td>*2</td>
                                                                                            <td>rs6759892</td>
                                                                                            <td><select size='1' name='UGT1A6_135' class='select'>
                                                                                                <option value='TT'>
                                                                                                    T/T
                                                                                                </option>
                                                                                                <option value='TG'>
                                                                                                    T/G
                                                                                                </option>
                                                                                                <option value='GG'>
                                                                                                    G/G
                                                                                                </option>
                                                                                            </select></td>
                                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                                       name='UGT1A6_135_checkbox'
                                                                                                       id='UGT1A6_135_checkbox'/><label
                                                                                                    for='G135'></label></td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>541A>G</td>
                                                                                            <td>*2</td>
                                                                                            <td>rs2070959</td>
                                                                                            <td><select size='1' name='UGT1A6_136' class='select'>
                                                                                                <option value='AA'>
                                                                                                    A/A
                                                                                                </option>
                                                                                                <option value='AG'>
                                                                                                    A/G
                                                                                                </option>
                                                                                                <option value='GG'>
                                                                                                    G/G
                                                                                                </option>
                                                                                            </select></td>
                                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                                       name='UGT1A6_136_checkbox'
                                                                                                       id='UGT1A6_136_checkbox'/><label
                                                                                                    for='G136'></label></td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>552A>C</td>
                                                                                            <td>*2</td>
                                                                                            <td>rs1105879</td>
                                                                                            <td><select size='1' name='UGT1A6_137' class='select'>
                                                                                                <option value='AA'>
                                                                                                    A/A
                                                                                                </option>
                                                                                                <option value='AC'>
                                                                                                    A/C
                                                                                                </option>
                                                                                                <option value='CC'>
                                                                                                    C/C
                                                                                                </option>
                                                                                            </select></td>
                                                                                            <td><input type='checkbox' class='checkbox2'
                                                                                                       name='UGT1A6_137_checkbox'
                                                                                                       id='UGT1A6_137_checkbox'/><label
                                                                                                    for='G137'></label></td>
                                                                                        </tr>
                                                                                        </tr> </table>

                                                                                </div>

                                                                                <label class='showMore' for='_25'>
                                                                                    <p>UGT1A8</p>
                                                                                    </label><input id='_25' type='checkbox'>
                                                                                    <div>

                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Nucleotide Change</td>
                                                                                                <td>Allele Variant</td>
                                                                                                <td>rs</td>
                                                                                                <td>Genotype</td>
                                                                                                <td>Include in Report</td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td>518C>T</td>
                                                                                                <td>*2</td>
                                                                                                <td>rs1042597</td>
                                                                                                <td><select size='1' name='UGT1A8_138' class='select'>
                                                                                                    <option value='CC'>
                                                                                                        C/C
                                                                                                    </option>
                                                                                                    <option value='CT'>
                                                                                                        C/T
                                                                                                    </option>
                                                                                                    <option value='TT'>
                                                                                                        T/T
                                                                                                    </option>
                                                                                                </select></td>
                                                                                                <td><input type='checkbox' class='checkbox2'
                                                                                                           name='UGT1A8_138_checkbox'
                                                                                                           id='UGT1A8_138_checkbox'/><label
                                                                                                        for='G138'></label></td>
                                                                                            </tr>
                                                                                            </tr> </table>

                                                                                    </div>

                                                                                    <label class='showMore' for='_26'>
                                                                                        <p>UGT1A9</p>
                                                                                        </label><input id='_26' type='checkbox'>
                                                                                        <div>

                                                                                            <table>
                                                                                                <tr>
                                                                                                    <td>Nucleotide Change</td>
                                                                                                    <td>Allele Variant</td>
                                                                                                    <td>rs</td>
                                                                                                    <td>Genotype</td>
                                                                                                    <td>Include in Report</td>
                                                                                                </tr>

                                                                                                <tr>
                                                                                                    <td>766G>A</td>
                                                                                                    <td>*2</td>
                                                                                                    <td>rs58597806</td>
                                                                                                    <td><select size='1' name='UGT1A9_139' class='select'>
                                                                                                        <option value='GG'>
                                                                                                            G/G
                                                                                                        </option>
                                                                                                        <option value='GA'>
                                                                                                            G/A
                                                                                                        </option>
                                                                                                        <option value='AA'>
                                                                                                            A/A
                                                                                                        </option>
                                                                                                    </select></td>
                                                                                                    <td><input type='checkbox' class='checkbox2'
                                                                                                               name='UGT1A9_139_checkbox'
                                                                                                               id='UGT1A9_139_checkbox'/><label
                                                                                                            for='G139'></label></td>
                                                                                                </tr>
                                                                                                </tr> </table>

                                                                                        </div>

                                                                                        <label class='showMore' for='_27'>
                                                                                            <p>UGT2B7</p>
                                                                                            </label><input id='_27' type='checkbox'>
                                                                                            <div>

                                                                                                <table>
                                                                                                    <tr>
                                                                                                        <td>Nucleotide Change</td>
                                                                                                        <td>Allele Variant</td>
                                                                                                        <td>rs</td>
                                                                                                        <td>Genotype</td>
                                                                                                        <td>Include in Report</td>
                                                                                                    </tr>

                                                                                                    <tr>
                                                                                                        <td>802C>T</td>
                                                                                                        <td>*2</td>
                                                                                                        <td>rs7439366</td>
                                                                                                        <td><select size='1' name='UGT2B7_140' class='select'>
                                                                                                            <option value='CC'>
                                                                                                                C/C
                                                                                                            </option>
                                                                                                            <option value='CT'>
                                                                                                                C/T
                                                                                                            </option>
                                                                                                            <option value='TT'>
                                                                                                                T/T
                                                                                                            </option>
                                                                                                        </select></td>
                                                                                                        <td><input type='checkbox' class='checkbox2'
                                                                                                                   name='UGT2B7_140_checkbox'
                                                                                                                   id='UGT2B7_140_checkbox'/><label
                                                                                                                for='G140'></label></td>
                                                                                                    </tr>
                                                                                                    </tr> </table>

                                                                                            </div>

                </ul>
              </div>
            -->

          </div>

        </div>
      </div>

    </div><br>
  </section>

  <!-- Шаг 2 -->

  <section class="" id="">
  	<div class="container">
  		<h2>/Шаг 2</h2>
  		<h3>Choose the Groups of Drugs</h3><br>

  		<!-- кнопка -->
  		<input type="checkbox">
  		<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"
  		style="background-color: #4B7872; color: #FFFFFF; width: 200px;">
  		PSYCHIATRY
  	</button>

  	<!-- окно -->
  	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">

  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<!-- внутренний контент -->
  				<div class="accordion" id="accordionExample">
  					<div class="card">
  						<div class="card-header" id="headingOne">
  							<h5 class="mb-0">
  								<input type="checkbox">
  								<button class="btn btn-link" type="button" data-toggle="collapse"
  								data-target="#collapseOne" aria-expanded="true"
  								aria-controls="collapseOne">
  								АНТИПСИХОТИКИ
  							</button>
  						</h5>
  					</div>

  					<div id="collapseOne" class="collapse" aria-labelledby="headingOne"
  					data-parent="#accordionExample">
  					<div class="card-body">
  						Все, что принадлежит данной группе<br>
  						чекбоксы<br>
  						<label class=""><input type="checkbox" checked>Чекбокс1</label>
  						<label class=""><input type="checkbox" checked>Чекбокс2</label>
  						<label class=""><input type="checkbox" checked>Чекбокс3</label>
  						<label class=""><input type="checkbox" checked>Чекбокс4</label>
  						Расположить можно по-другому. Окно тоже можно увеличить.
  						Все, что принадлежит данной группе<br>
  						чекбоксы<br>
  						<label class=""><input type="checkbox" checked>Чекбокс1</label>
  						<label class=""><input type="checkbox" checked>Чекбокс2</label>
  						<label class=""><input type="checkbox" checked>Чекбокс3</label>
  						<label class=""><input type="checkbox" checked>Чекбокс4</label>
  						Расположить можно по-другому. Окно тоже можно увеличить.
  						Все, что принадлежит данной группе<br>
  						чекбоксы<br>
  						<label class=""><input type="checkbox" checked>Чекбокс1</label>
  						<label class=""><input type="checkbox" checked>Чекбокс2</label>
  						<label class=""><input type="checkbox" checked>Чекбокс3</label>
  						<label class=""><input type="checkbox" checked>Чекбокс4</label>
  						Расположить можно по-другому. Окно тоже можно увеличить.
  					</div>
  				</div>
  			</div>
  			<div class="card">
  				<div class="card-header" id="headingTwo">
  					<h5 class="mb-0">
  						<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
  						data-target="#collapseTwo" aria-expanded="false"
  						aria-controls="collapseTwo">
  						АНТИДЕПРЕССАНТЫ
  					</button>
  				</h5>
  			</div>
  			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
  			data-parent="#accordionExample">
  			<div class="card-body">
  				Все, что принадлежит данной группе<br>
  				чекбоксы<br>
  				<label class=""><input type="checkbox" checked>Чекбокс1</label>
  				<label class=""><input type="checkbox" checked>Чекбокс2</label>
  				<label class=""><input type="checkbox" checked>Чекбокс3</label>
  				<label class=""><input type="checkbox" checked>Чекбокс4</label>
  				Расположить можно по-другому. Окно тоже можно увеличить.
  			</div>
  		</div>
  	</div>
  	<div class="card">
  		<div class="card-header" id="headingThree">
  			<h5 class="mb-0">
  				<button class="btn btn-link" type="button" data-toggle="collapse"
  				data-target="#collapseThree" aria-expanded="false"
  				aria-controls="collapseThree">
  				ТРАНКВИЛИЗАТОРЫ
  			</button>
  		</h5>
  	</div>
  	<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
  	data-parent="#accordionExample">
  	<div class="card-body">
  		Все, что принадлежит данной группе<br>
  		чекбоксы<br>
  		<label class=""><input type="checkbox" checked>Чекбокс1</label>
  		<label class=""><input type="checkbox" checked>Чекбокс2</label>
  		<label class=""><input type="checkbox" checked>Чекбокс3</label>
  		<label class=""><input type="checkbox" checked>Чекбокс4</label>
  		Расположить можно по-другому. Окно тоже можно увеличить.
  	</div>
  </div>
</div>
</div>
<!-- конец контента -->
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-outline-dark btn-sm"
	data-dismiss="modal">Закрыть</button>

</div>
</div>
</div>
</div>

<br><br>
            <!-- начало
            <div class="row">
                <div class="col-3">
                  <div class="list-group" id="list-tab" role="tablist">


                    <a class="list-group-item list-group-item-action" id="list-psy" data-toggle="list" href="#list-psy-list" role="tab" aria-controls="home" style="width: 200px;">PSYCHIATRY</a>
                    <a class="list-group-item list-group-item-action" id="list-allerg" data-toggle="list" href="#list-allerg-list" role="tab" aria-controls="profile" style="width: 200px;">ALLERGOLOGY</a>


                  </div>
                </div>
                <div class="col-8">
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-psy-list" role="tabpanel" aria-labelledby="list-home-list">
                        <div class="row">
                            <div class="col-4">
                              <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action" id="list-psy-antipsy" data-toggle="list" href="#list-psy-list-sub" role="tab" aria-controls="home" style="width: 200px;">Антипсихотики</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#" role="tab" aria-controls="profile" style="width: 200px;">Антидепрессанты</a>

                              </div>
                            </div>
                            <div class="col-8">
                              <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-psy-list-sub" role="tabpanel" aria-labelledby="list-home-list">
                                    <div class="row">
                                        <div class="col-4">
                                          <div class="list-group" id="list-tab" role="tablist">
                                            <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home" style="width: 150px;">Производные1</a>
                                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile" style="width: 150px;">Производные2</a>

                                          </div>
                                        </div>
                                        <div class="col-4">
                                          <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

                                                <div class="for_checkbox">
                                                <label class="container">Хлорпромазин
                                                    <input type="checkbox" class="checkbox2">
                                                    <span class="checkmark"></span>
                                                  </label>

                                                  <label class="container">Левомепромазин
                                                    <input type="checkbox" class="checkbox2">
                                                    <span class="checkmark"></span>
                                                  </label>

                                                  <label class="container">Промазин
                                                    <input type="checkbox" class="checkbox2">
                                                    <span class="checkmark"></span>
                                                  </label>

                                                  </div>

                                            </div>
                                            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">2</div>
                                            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                                            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
                                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="tab-pane fade" id="list-allerg-list" role="tabpanel" aria-labelledby="list-profile-list">2</div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">3</div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">4</div>
                  </div>
                </div>
              </div><br><br>
              конец -->

              <button type="button" class="btn btn-outline-secondary" href="#">&larr; Назад</button>
              <button type="button" class="btn btn-outline-success" href="#">Дальше &rarr;</button>

            </section>
            <br><br>
            <!-- шаг 3 -->

            <section class="" id="">
            	<div class="container">
            		<h2>/Шаг 3</h2>
            		<h3>Information about patient and organzation</h3><br>

            		<div class="form-group">
            			<label for="exampleInputAvailable">Number of Uses Available</label>
            			<input type="text" class="form-control" id="exampleInputAvailable" aria-describedby="" placeholder="0">
            			<small id="" class="form-text text-muted">Здесь можно написать какую-нибудь подсказку*</small>
            		</div>

            		<div class="form-group">
            			<label for="exampleInputId">ID</label>
            			<input type="text" class="form-control" id="exampleInputId" aria-describedby="" placeholder="AAA000300">

            		</div>

            		<div class="form-group">
            			<label for="exampleInputSurname">Surname</label>
            			<input type="text" class="form-control" id="exampleInputSurname" aria-describedby=""
            			placeholder="Smith">

            		</div>

            		<div class="form-group">
            			<label for="exampleInputFirstName">First Name</label>
            			<input type="text" class="form-control" id="exampleInputFirstName" aria-describedby=""
            			placeholder="John">

            		</div>

            		<div class="form-group">
            			<label for="exampleInputSecondName">Second Name</label>
            			<input type="text" class="form-control" id="exampleInputSecondName" aria-describedby=""
            			placeholder="Adam">

            		</div>

            		<div class="form-group">
            			<label for="exampleInputBirth">Date of Birth</label>
            			<input type="text" class="form-control" id="exampleInputBirth" aria-describedby=""
            			placeholder="01/01/1980">

            		</div>

            		<div class="form-group">
            			<label for="exampleInputHeight">Height (cm)</label>
            			<input type="text" class="form-control" id="exampleInputHeight" aria-describedby="" placeholder="170">

            		</div>

            		<div class="form-group">
            			<label for="exampleInputWeight">Weight (kg)</label>
            			<input type="text" class="form-control" id="exampleInputWeight" aria-describedby="" placeholder="80">

            		</div>

            		<div class="form-group">
            			<label for="exampleInputSex">Sex (m/w)</label>
            			<input type="text" class="form-control" id="exampleInputSex" aria-describedby="" placeholder="m">

            		</div>

            		<div class="form-group">
            			<label for="exampleInputRase">Rase</label>
            			<input type="text" class="form-control" id="exampleInputRase" aria-describedby=""
            			placeholder="Caucasian">

            		</div>

            		<div class="form-group">
            			<label for="exampleInputNameDoctor">Name of Doctor</label>
            			<input type="text" class="form-control" id="exampleInputNameDoctor" aria-describedby=""
            			placeholder="Gregory House, MD, PhD, Lab Director for RAS">

            		</div>

            <!--<button type="submit" class="btn btn-success">Отправить</button>

                    <button type="button" class="btn btn-outline-secondary" href="#">&larr;	Назад</button>
                    <button type="submit" class="btn btn-outline-success" href="#">Дальше &rarr;</button>
                  -->

                </div>
              </section>

              <br><br>
              <!-- шаг 4 -->

              <section class="" id="">
              	<div class="container">
              		<h2>/Шаг 4</h2>
              		<h3>Generation of Report</h3>
              		<br>


              		<button type="button" class="btn btn-dark btn-lg btn-block"
              		style="background-color: #4B7872; color: #FFFFFF; border: solid 1px #4B7872;">Сформировать
              	отчет</button>
              	<button type="button" class="btn btn-light btn-lg btn-block">Назад</button>

              </div>
            </section>
          </form>

          <!--  конец формы -->

          <!-- JS -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        <script src="js/form.js"></script>
        <script src="js/app.js" async></script>

      </body>

      </html>