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
  }