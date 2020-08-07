<?php
  $action = $_POST['action'];

  include './config.php';

  if ($action == 'loadCategories'){
    $data = $_POST['data'];
    $output = '';
    $allCats = '';

    foreach ($data as $key => $value){
      $statement = $pdo->prepare("SELECT Gene FROM polymorphisms WHERE idCategory = :idCategory GROUP BY Gene ORDER BY 'ID_Gene'");
      $statement->bindValue(':idCategory', $value);
      $statement->execute();
      $rezult = $statement->fetchAll(PDO::FETCH_ASSOC);

      $output .= '
        <div class="list-group '.($key == 0 ? 'active' : '').'" id="list-tab'.($key + 1).'" role="tablist" data-parent-id="'.$value.'">';

      foreach($rezult as $key1 => $value1){
        $output .= '
        <a class="list-group-item list-group-item-action '.($key1 == 0 ? 'active' : '').'"
        id="list-transport-list1" data-toggle="list" href="#list-transport1"
        role="tab" aria-controls="transport1">'.$value1['Gene'].'</a>';

        $allCats .= '
        <a class="list-group-item list-group-item-action list-group-item-all"
        id="list-transport-list1" data-toggle="list" href="#list-transport1"
        role="tab" aria-controls="transport1">'.$value1['Gene'].'</a>';
      }

      $output .= '
        </div>';
    }

    $output .= '<div class="list-group" id="list-tab-all" role="tablist" data-parent-id="0">';
    $output .= $allCats;
    $output .= '</div>';

    echo json_encode(array('type' => 'categories', 'data' => $output));
  }else if ($action == 'loadTable'){
    $data = $_POST['data'];
    $output = '';

    for ($i = 0; $i < sizeof($data); $i++){
      $statement = $pdo->prepare("SELECT * FROM polymorphisms WHERE Gene = :geneName");
      $statement->bindValue(':geneName', $data[$i]);
      $statement->execute();
      $rezult = $statement->fetchAll(PDO::FETCH_ASSOC);

      $output .= '
        <div class="tab-pane" id="list-transport" role="tablepanel"
        aria-labelledby="list-home-list" data-category-name="'.$data[$i].'">
        <table id="table-'.$i.'">
          <thead>
            <tr>
              <td class="td_head">Нуклеотидная замена</td>
              <td class="td_head">Аллельный вариант</td>
              <td class="td_head">rs</td>
              <td class="td_head">Генотип</td>
              <td class="td_head">Включить в отчет</td>
            </tr>
          </thead>
          <tbody>';

      foreach ($rezult as $key => $value){
        $output .= '
            <tr>
              <td>'.$value['Nucleotide_change'].'</td>
              <td>'.$value['Allele_variant'].'</td>
              <td>'.$value['rs'].'</td>
              <td>
              <select size="1" name="VKORC1_99" class="select" k-pol="'.$value['k_pol'].'">
              <option value="'.$value['Genotype_1'].'">
              '.$value['Genotype_1'].'
              </option>
              <option value="'.$value['Genotype_2'].'">
              '.$value['Genotype_2'].'
              </option>
              <option value="'.$value['Genotype_3'].'">
              '.$value['Genotype_3'].'
              </option>
              </select></td>
              <td><input type="checkbox" class="checkbox2"
              name="VKORC1_99_checkbox" id="VKORC1_99_checkbox" /><label
              for="G99"></label></td>
            </tr>';
      }

      $output .= '
            </tbody>
          </table>
        </div>';
    }

    echo json_encode(array('type' => 'tableData', 'data' => $output));
  } else if ($action == 'loadPops_old') {
    $data = $_POST['data'];
    $output = '';
    // $outputArr = new array

    foreach ($data as $key => $value){
      $statement = $pdo->prepare("SELECT Group_Name_ru FROM spec WHERE Specialization = :specialuzation GROUP BY Group_Name_ru");
      $statement->bindValue(':specialuzation', $value);
      $statement->execute();
      $rezult_drugGroups = $statement->fetchAll(PDO::FETCH_ASSOC);

      $output .= '
      <div class="modal fade" id="'.$value.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="accordion" id="accordionExample">';

      foreach ($rezult_drugGroups as $key1 => $value1){
        $statement = $pdo->prepare("SELECT Subgroup_Name_ru FROM spec WHERE Group_Name_ru = :group_name GROUP BY Subgroup_Name_ru");
        $statement->bindValue(':group_name', $value1['Group_Name_ru']);
        $statement->execute();
        $rezult_drugSubgroups = $statement->fetchAll(PDO::FETCH_ASSOC);

        $output .= '
          <div class="card" data-id="card'.($key1 + 1).'">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
              <input type="checkbox" name="" data-collapse="true" data-collapse-target="collapse'.($key1 + 1).'">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.($key1 + 1).'"
                  aria-expanded="false" aria-controls="'.($key1 + 1).'">
                  '.$value1['Group_Name_ru'].'
                </button>
              </h5>
            </div>

            <div id="collapse'.($key1 + 1).'" class="collapse" aria-labelledby="headingOne"
              data-parent="#accordionExample">
              <div class="card-body">
        ';

        foreach ($rezult_drugSubgroups as $key2 => $value2){
          $statement = $pdo->prepare("SELECT ID, Drug_Name_ru, Primary_Enzyme_1, Primary_Enzyme_2, Secondary_Enzyme_1, Secondary_Enzyme_2, Secondary_Enzyme_3, Pharmacodynamic_Gene FROM general_data WHERE Subgroup_Name_ru = :subgroup_name");
          $statement->bindValue(':subgroup_name', $value2['Subgroup_Name_ru']);
          $statement->execute();
          $rezult_drugName = $statement->fetchAll(PDO::FETCH_ASSOC);

          $output .= '
                <input type="checkbox" name="" id="checkbox" class="panel-collapse" data-collapse="true" data-collapse-target-panel="'.$key2.'">
                <button class="accordion" data-id="acc'.($key2 + 1).'" data-parent="card'.($key1 + 1).'">'.$value2['Subgroup_Name_ru'].'</button>
                <div class="panel" panel-id="'.$key2.'" data-parent="acc'.($key2 + 1).'">';

          foreach ($rezult_drugName as $key3 => $value3){
            $arr = array($value3['Primary_Enzyme_1'], $value3['Primary_Enzyme_2'], $value3['Secondary_Enzyme_1'], $value3['Secondary_Enzyme_2'], $value3['Secondary_Enzyme_3']);
            $arr = array_filter($arr);

            $output .= '
              <input type="checkbox" id="'.$value3['ID'].'" name="'.$value3['ID'].'" class="drug-checkbox" /><label for="'.$value3['ID'].'" data-enzyme="'.implode(',', $arr).'" data-pharmacodynamic-gene="'.$value3['Pharmacodynamic_Gene'].'">'.$value3['Drug_Name_ru'].'</label>
            ';
          }
          $output .= '</div>';
        }
        $output .= '
              </div>
            </div>
          </div>';
      }
      $output .= '
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">Закрыть</button>

                </div>
              </div>
            </div>
          </div>
        </div>';
    }

    echo json_encode(array('type' => 'popsData', 'data' => $output));
  } else if ($action == 'loadPops'){
    $data = $_POST['data'];
    $outputGroups = '';
    $outputSubGroups = '';
    $outputDrugs = '';
    $rezOutput = '';

    foreach ($data as $key => $value){
      $statement = $pdo->prepare("SELECT Group_Name_ru FROM spec WHERE Specialization = :specialuzation GROUP BY Group_Name_ru");
      $statement->bindValue(':specialuzation', $value);
      $statement->execute();
      $rezult_drugGroups = $statement->fetchAll(PDO::FETCH_ASSOC);

      foreach ($rezult_drugGroups as $key1 => $value1){
        $statement = $pdo->prepare("SELECT ID, Subgroup_Name_ru FROM spec WHERE Group_Name_ru = :group_name GROUP BY Subgroup_Name_ru");
        $statement->bindValue(':group_name', $value1['Group_Name_ru']);
        $statement->execute();
        $rezult_drugSubgroups = $statement->fetchAll(PDO::FETCH_ASSOC);

        $outputGroups .= '
          <div>
          <input id="cg-'.$key1.'" type="checkbox"> 
          <label for="cg-'.$key1.'">'.$value1['Group_Name_ru'].'</label> <br>
          </div>
        ';

        foreach ($rezult_drugSubgroups as $key2 => $value2){
          $statement = $pdo->prepare("SELECT ID, Drug_Name_ru, Primary_Enzyme_1, Primary_Enzyme_2, Secondary_Enzyme_1, Secondary_Enzyme_2, Secondary_Enzyme_3, Pharmacodynamic_Gene FROM general_data WHERE Subgroup_Name_ru = :subgroup_name GROUP BY Drug_Name_ru");
          $statement->bindValue(':subgroup_name', $value2['Subgroup_Name_ru']);
          $statement->execute();
          $rezult_drugName = $statement->fetchAll(PDO::FETCH_ASSOC);

          $outputSubGroups .= '
            <div>
            <input id="sg-'.$value2['ID'].'" type="checkbox" data-group-name="'.$value1['Group_Name_ru'].'">
            <label for="sg-'.$value2['ID'].'" class="subgroup-item" data-subgroup-id="'.$value2['Subgroup_Name_ru'].'">'.$value2['Subgroup_Name_ru'].'</label> <br>
            </div>
          ';

          foreach ($rezult_drugName as $key3 => $value3){
            $arr = array($value3['Primary_Enzyme_1'], $value3['Primary_Enzyme_2'], $value3['Secondary_Enzyme_1'], $value3['Secondary_Enzyme_2'], $value3['Secondary_Enzyme_3']);
            $arr = array_filter($arr);

            $outputDrugs .= '
                <div>
                <input type="checkbox" id="'.$value3['ID'].'" name="'.$value3['ID'].'" class="drug-checkbox" data-subgroup-name="'.$value2['Subgroup_Name_ru'].'" data-subgroup-id="sg-'.$value2['ID'].'"/>
                <label for="'.$value3['ID'].'" data-enzyme="'.implode(',', $arr).'" data-pharmacodynamic-gene="'.$value3['Pharmacodynamic_Gene'].'">'.$value3['Drug_Name_ru'].'</label> <br>
                </div>
            ';
          }
        }
      }

      if ($outputDrugs != ''){
        $rezOutput .= '
          <div class="group-item row '.($key == 0 ? 'active' : '').'" data-cat-name="'.$value.'">
            <div class="col group_name"> 
              '.$outputGroups.'
            </div>

            <div class="col supgroup_name"> 
            '.$outputSubGroups.'
            </div>

            <div class="col drugs_name"> 
              '.$outputDrugs.'
            </div>
          </div>
        ';

        $outputGroups = '';
        $outputSubGroups = '';
        $outputDrugs = '';
      }
    }

    echo json_encode(array('type' => 'popsData', 'data' => $rezOutput));
  }
