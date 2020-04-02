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
                     ?>
            <a class="nav-link <?php if ($key == 0){echo 'active';} ?>" id="v-pills-home-tab" data-toggle="pill"
              href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"
              data-category-id="<?php echo $value['idCategory']; ?>"><?php echo $value['name']; ?>
              &rarr;</a>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- выбираем маркер (транспорт) -->
        <div class="col-6">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row">
                <div class="col-4 list-group__container">
                  <div class="list-group" id="list-tab" role="tablist">
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
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button type="button" class="btn btn-outline-secondary" href="#">&larr; Назад</button>
      <button type="button" class="btn btn-outline-success" href="#">Дальше &rarr;</button>
    </div>
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
      
        <style>
        .someclass {
          background-color: #4B7872;
          color: #FFFFFF;
          width: 240px;
          margin: 5px 10px 5px 1px;
        }
      </style>
      
      <!-- кнопка -->
      <input class="checkbox__modal" type="checkbox" name="psychiatry">
      <button type="button" class="btn someclass" data-toggle="modal" data-target="#psychiatry" data-specialization-name="psychiatry"> PSYCHIATRY
      </button>
      <input class="checkbox__modal" type="checkbox" name="neurology">
      <button type="button" class="btn someclass" data-toggle="modal" data-target="#neurology" data-specialization-name="neurology"> NEUROLOGY
      </button>
      <input class="checkbox__modal" type="checkbox" name="cardiology">
      <button type="button" class="btn someclass" data-toggle="modal" data-target="#cardiology" data-specialization-name="cardiology"> CARDIOLOGY
      </button><br>
       <input class="checkbox__modal" type="checkbox" name="allergology">
      <button type="button" class="btn someclass" data-toggle="modal" data-target="#allergology" data-specialization-name="allergology"> ALLERGOLOGY
      </button>
       <input class="checkbox__modal" type="checkbox" name="gastroenterology">
      <button type="button" class="btn someclass" data-toggle="modal" data-target="#gastroenterology" data-specialization-name="gastroenterology">
        GASTROENTEROLOGY
      </button>
      <input class="checkbox__modal" type="checkbox" name="endocrinology">
      <button type="button" class="btn someclass" data-toggle="modal" data-target="#endocrinology" data-specialization-name="endocrinology"> ENDOCRINOLOGY
      </button><br>
      <input class="checkbox__modal" type="checkbox" name="dermatology">
      <button type="button" class="btn someclass" data-toggle="modal" data-target="#dermatology" data-specialization-name="dermatology"> DERMATOLOGY
      </button>
      <input class="checkbox__modal" type="checkbox" name="infections">
      <button type="button" class="btn someclass" data-toggle="modal" data-target="#infections" data-specialization-name="infections"> INFECTIONS
      </button>
      <input class="checkbox__modal" type="checkbox" name="oncology">
      <button type="button" class="btn someclass" data-toggle="modal" data-target="#oncology" data-specialization-name="oncology"> ONCOLOGY
      </button>

      <!-- окно -->
      <?php 
        $statement = $pdo->prepare("SELECT * FROM category");
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $key => $value):
      ?>

      <?php endforeach; ?>
      <div class="modals">
          
      </div>
      <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Антипсихотики (Group_Name_ru)
                      </button>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body">
                      <style>
                        .panel>* {
                          float: left;
                        }

                        .panel>input {
                          clear: both;
                        }
                      </style>
                      <button class="accordion">Subgroup_Name_ru</button>
                      <div class="panel">
                        <input type="checkbox" id="ID1" name="ID1" /><label for="ID1">(Drug_Name_ru)</label>
                        <input type="checkbox" id="ID2" name="ID2" /><label for="ID2">(Drug_Name_ru)</label>
                        <input type="checkbox" id="ID3" name="ID3" /><label for="ID3">(Drug_Name_ru)</label>
                        <input type="checkbox" id="ID4" name="ID4" /><label for="ID4">(Drug_Name_ru)</label>
                        <input type="checkbox" id="ID5" name="ID5" /><label for="ID5">(Drug_Name_ru)</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Антидепрессанты
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      <button class="accordion">Subgroup_Name_ru</button>
                      <div class="panel">
                        <p>Drug_Name_ru</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Транквилизаторы
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                    data-parent="#accordionExample">
                    <div class="card-body">
                      <button class="accordion">Subgroup_Name_ru</button>
                      <div class="panel">
                        <p>Drug_Name_ru</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        СДВГ
                      </button>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <button class="accordion">Subgroup_Name_ru</button>
                      <div class="panel">
                        <p>Drug_Name_ru</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">Закрыть</button>

              </div>
            </div>
          </div>
        </div>
      </div> -->

        <br><br>
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
        <input type="text" class="form-control" id="exampleInputAvailable" aria-describedby="" placeholder="0" autofocus>
        <small id="" class="form-text text-muted">Здесь можно написать какую-нибудь подсказку*</small>
      </div>

      <div class="form-group">
        <label for="exampleInputId">ID</label>
        <input type="text" class="form-control" id="exampleInputId" aria-describedby="" placeholder="AAA000300">

      </div>

      <div class="form-group">
        <label for="exampleInputSurname">Surname</label>
        <input type="text" class="form-control" id="exampleInputSurname" aria-describedby="" placeholder="Smith">

      </div>

      <div class="form-group">
        <label for="exampleInputFirstName">First Name</label>
        <input type="text" class="form-control" id="exampleInputFirstName" aria-describedby="" placeholder="John">

      </div>

      <div class="form-group">
        <label for="exampleInputSecondName">Second Name</label>
        <input type="text" class="form-control" id="exampleInputSecondName" aria-describedby="" placeholder="Adam">

      </div>

      <div class="form-group">
        <label for="exampleInputBirth">Date of Birth</label>
        <input type="text" class="form-control" id="exampleInputBirth" aria-describedby="" placeholder="01/01/1980">

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
        <input type="text" class="form-control" id="exampleInputRase" aria-describedby="" placeholder="Caucasian">

      </div>

      <div class="form-group">
        <label for="exampleInputNameDoctor">Name of Doctor</label>
        <input type="text" class="form-control" id="exampleInputNameDoctor" aria-describedby=""
          placeholder="Gregory House, MD, PhD, Lab Director for RAS">

      </div>
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

  <!--  -->
  <style>
    .panel {
      padding: 0 20px;
      background-color: #FFFFFF;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.2s ease-out;
    }
  </style>

  <script>
    document.addEventListener('click', (e) => {
      if(e.target && e.target.className == 'accordion'){
        let panel = e.target.nextElementSibling;

        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      }
    });
  </script>

  <!--  конец формы -->

  <!-- JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
