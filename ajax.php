 <?php
  $action = $_POST['action'];

  include './config.php';

  if ($action == 'loadCategories'){
    $data = $_POST['data'];

    $statement = $pdo->prepare("SELECT Gene FROM polymorphisms WHERE idCategory = :idCategory GROUP BY Gene ORDER BY 'ID_Gene'");
    //
    $statement->bindValue(':idCategory', $data[0]['idCategory']);
    $statement->execute();
    $rezult = $statement->fetchAll(PDO::FETCH_ASSOC);

    $output = '';

    foreach($rezult as $key => $value){
      $output .= '
      <a class="list-group-item list-group-item-action '.($key == 0 ? 'active' : '').'"
      id="list-transport-list1" data-toggle="list" href="#list-transport1"
      role="tab" aria-controls="transport1">'.$value['Gene'].'</a>
      ';
    }

    echo json_encode(array('type' => 'categories', 'data' => $output));
  }else if ($action == 'loadTable'){
    $data = $_POST['data'];

    $statement = $pdo->prepare("SELECT * FROM polymorphisms WHERE Gene = :geneName");
    $statement->bindValue(':geneName', $data[0]['geneName']);
    $statement->execute();
    $rezult = $statement->fetchAll(PDO::FETCH_ASSOC);

    $output = '';

    foreach($rezult as $key => $value){
      $output .= '
      <tr>
      <td>'.$value['Nucleotide_change'].'</td>
      <td>'.$value['Allele_variant'].'</td>
      <td>'.$value['rs'].'</td>
      <td>
      <select size="1" name="VKORC1_99" class="select">
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
      </tr>
      ';
    }

    echo json_encode(array('type' => 'tableData', 'data' => $output));
  } else if ($action == 'loadPops') {
    $data = $_POST['data'];
    $output = '';

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
              '.strtoupper($value).'
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
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-'.($value1['Group_Name_ru']).($key1 + 1).'"
                  aria-expanded="false" aria-controls="'.($key1 + 1).'">
                  '.$value1['Group_Name_ru'].'
                </button>
              </h5>
            </div>

            <div id="collapse-'.($value1['Group_Name_ru']).($key1 + 1).'" class="collapse" aria-labelledby="headingOne"
              data-parent="#accordionExample">
              <div class="card-body">
                <style>
                  .panel>* {
                    float: left;
                  }

                  .panel>input {
                    clear: both;
                  }
                </style>';

        foreach ($rezult_drugSubgroups as $key2 => $value2){
          $statement = $pdo->prepare("SELECT ID, Drug_Name_ru FROM spec WHERE Subgroup_Name_ru = :subgroup_name");
          $statement->bindValue(':subgroup_name', $value2['Subgroup_Name_ru']);
          $statement->execute();
          $rezult_drugName = $statement->fetchAll(PDO::FETCH_ASSOC);

          $output .= '
                <button class="accordion">'.$value2['Subgroup_Name_ru'].'</button>
                <div class="panel">';

          foreach ($rezult_drugName as $key3 => $value3){
            $output .= '
              <input type="checkbox" id="'.$value3['ID'].'" name="'.$value3['ID'].'" /><label for="'.$value3['ID'].'">'.$value3['Drug_Name_ru'].'</label>
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
  }
