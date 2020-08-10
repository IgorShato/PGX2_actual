<?php include './config.php';?>
<?php session_start();
 if($_SESSION['admin']!= "admin"){
 header("Location: login.php");    
exit; 
} 
?>  
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
    
  <!-- форма -->
  <!-- шаг 1 -->
  <form action="report.php" method="POST" target="_blank" id="pdf-form">
    <section class="tab">
      <br>
      <div class="container">
        <fieldset>
          <legend>
            <h2 style="text-align: center;">Внесите результаты генотипирования</h2>
            <legend>
        </fieldset>
      </div>

      <!-- выбираем направление  -->
      <div class="container">
        <div class="container-change">
        <!--<div class="container container-main">-->
          <!--<div class="row">
        <div class="col-3">-->
          <!--<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">-->
          <div class="nav nav-pills" id="nav-tab" role="tablist">
            <button type="button" class="nav-link-dis" id="v-pills-home-tab" data-toggle="pill" data-category-id="0">Все</button>

            <?php
                  $statement = $pdo->prepare("SELECT * FROM category");
                  $statement->execute();
                  $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                  
                  foreach($data as $key => $value):
                     ?>

            <a class="nav-link  <?php if ($key == 0){echo 'active';} ?>" id="v-pills-home-tab" data-toggle="pill"
              href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"
              data-category-id="<?php echo $value['idCategory']; ?>"><?php echo $value['name']; ?>
            </a>
            <?php endforeach; ?> <button type="button" class="nav-link-dis"
              id="v-pills-home-tab">Фармакодинамика</button>
          </div>
        </div>
                  </div>
        <div class="container">
        <div class="container-main">
        <!-- выбираем маркер -->
        <div class="container container-marker">
          <div class="col-12">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                aria-labelledby="v-pills-home-tab">
                <div class="row">
                  <div class="col-4 list-group__container">
                  </div>
                  <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                    </div>
                
                </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      </div>
      </div>

      </div>
      </div>
      </div>
      </div>
      </div> 
                 </div>
       <!-- next and prev -->
       <div class="container">
<div class="container container_buttons">
      <div style="overflow:auto;">
  <div style="float:right;">
   <button type="button" id="prevBtn" onclick="nextPrev(-1)">Назад</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Далее</button>
  </div>
</div>
                  </div>
                  </div>
    </section>

    <!-- Шаг 2 -->
    <br>
    <section class="tab">
      <div class="container">
        <fieldset>
          <legend>
            <h2 style="text-align: center;">Выберите лекарства, которые необходимо включить в отчет</h2>
            <legend>
        </fieldset>
      </div>

      <div class="container">
          <div class="container container-main">
        <div class="row">
          <div class="col-3 specialization_name">
              <div class="list">
            <!-- кнопка -->
            <!--<input class="checkbox__modal" type="checkbox" name="psychiatry">-->
            <button type="button" id="flag" class="btn someclass" data-toggle="modal" data-target="#psychiatry"
              data-specialization-name="psychiatry">ПСИХИАТРИЯ<label class="switch"><input class="checkbox__modal" id="checbox" type="checkbox" name="psychiatry"><span class="slider round"></span></label>
            </button>
            <!--<input class="checkbox__modal" type="checkbox" name="neurology">-->
            <button type="button" id="flag" class="btn someclass" data-toggle="modal" data-target="#neurology"
              data-specialization-name="neurology">НЕВРОЛОГИЯ<label class="switch"><input class="checkbox__modal" type="checkbox" name="neurology"><span class="slider round"></span></label> 
            </button>
            <!--<input class="checkbox__modal" type="checkbox" name="cardiology">-->
            <button type="button" id="flag" class="btn someclass" data-toggle="modal" data-target="#cardiology"
              data-specialization-name="cardiology">КАРДИОЛОГИЯ<label class="switch"><input class="checkbox__modal" type="checkbox" name="cardiology"><span class="slider round"></span></label>
            </button>
            <!--<input class="checkbox__modal" type="checkbox" name="allergology">-->
            <button type="button" id="flag" class="btn someclass" data-toggle="modal" data-target="#allergology"
              data-specialization-name="allergology">АЛЛЕРГОЛОГИЯ<label class="switch"><input class="checkbox__modal" type="checkbox" name="allergology"><span class="slider round"></span></label>
            </button>
            <!--<input class="checkbox__modal" type="checkbox" name="gastroenterology">-->
            <button type="button" id="flag" class="btn someclass" data-toggle="modal" data-target="#gastroenterology"
              data-specialization-name="gastroenterology">
             ГАСТРОЭНТЕРОЛОГИЯ<label class="switch"><input class="checkbox__modal" type="checkbox" name="gastroenterology"><span class="slider round"></span></label>
            </button>
            <!--<input class="checkbox__modal" type="checkbox" name="endocrinology">-->
            <button type="button" id="flag" class="btn someclass" data-toggle="modal" data-target="#endocrinology"
              data-specialization-name="endocrinology">ЭНДОКРИНОЛОГИЯ<label class="switch"><input class="checkbox__modal" type="checkbox" name="endocrinology"><span class="slider round"></span></label>
            </button>
            <!--<input class="checkbox__modal" type="checkbox" name="dermatology">-->
            <button type="button" id="flag" class="btn someclass" data-toggle="modal" data-target="#dermatology"
              data-specialization-name="dermatology">ДЕРМАТОЛОГИЯ<label class="switch"><input class="checkbox__modal" type="checkbox" name="dermatology"><span class="slider round"></span></label>
            </button>
            <!--<input class="checkbox__modal" type="checkbox" name="infections">-->
            <button type="button" id="flag" class="btn someclass" data-toggle="modal" data-target="#infections"
              data-specialization-name="infections">ИНФЕКЦИИ<label class="switch"><input class="checkbox__modal" type="checkbox" name="infections"><span class="slider round"></span></label>
            </button>
            <!--<input class="checkbox__modal" type="checkbox" name="oncology">-->
            <button type="button" id="flag" class="btn someclass" data-toggle="modal" data-target="#oncology"
              data-specialization-name="oncology">ОНКОЛОГИЯ<label class="switch" type="checkbox"><input class="checkbox__modal" type="checkbox" name="oncology"><span class="slider round"></span></label>
            </button>
            <button type="button" id="flag" class="btn someclass" data-toggle="modal" data-target="#covid19"
              data-specialization-name="covid19">COVID19<label class="switch"><input class="checkbox__modal" type="checkbox" name="covid19"><span class="slider round"></span></label>
              </button>
              </div>
          </div>
          
          <div class="step2-groups col">
          </div>
        </div>

<style>
#flag { cursor: pointer; }
#flag.active {background: gray; color: #FFFFFF; border: solid 1px gray;}
  </style>

      <!-- окно -->
      <?php 
       $statement = $pdo->prepare("SELECT * FROM category");
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($data as $key => $value):
      ?>

      <?php endforeach; ?>
      <!--<div class="modals">-->

      </div>
 <!-- next and prev -->
 <!--<div class="container">-->
     <div class="container container_buttons">
      <div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Назад</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Далее</button>
  </div>
</div>
                  </div>
                  </div>
                  <!--</div>-->
<!-- -->
      
<br>
    </section>
    <!-- шаг 3 -->

    <section class="tab">
      <div class="container">
        <fieldset>
          <legend>
            <h2 class="text-form" style="text-align: center;">Внесите данные пациента</h2>
            <p class="lead" style="text-align: center; color: #FFFFFF; font-size: 14.5px;">Если данные отсутствуют &mdash;
              оставьте поле пустым</p>
          </legend>
        </fieldset>

        <!-- данные пациента - поля -->
        <div class="container container-date-patient">
          <div class="form-group row">
            <label for="InputId" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control is-valid" name="InputId" placeholder="Введите ID" autofocus>
            </div>
          </div>

          <div class="form-group row">
            <label for="InputSurname" class="col-sm-2 col-form-label">Фамилия</label>
            <div class="col-sm-10">
              <input type="text" class="form-control is-valid" name="InputSurname" placeholder="Введите фамилию">
            </div>
          </div>

          <div class="form-group row">
            <label for="InputFirstName" class="col-sm-2 col-form-label">Имя</label>
            <div class="col-sm-10">
              <input type="text" class="form-control is-valid" name="InputFirstName" placeholder="Введите имя">
            </div>
          </div>

          <div class="form-group row">
            <label for="InputSecondName" class="col-sm-2 col-form-label">Отчество</label>
            <div class="col-sm-10">
              <input type="text" class="form-control is-valid" name="InputSecondName" placeholder="Введите отчество">
            </div>
          </div>

          <div class="form-group row">
            <label for="InputBirth" class="col-sm-2 col-form-label">Дата рождения</label>
            <div class="col-sm-10">
              <input type="date" class="form-control is-valid" name="InputBirth" placeholder="01.01.1970">
            </div>
          </div>

          <div class="form-group row">
            <label for="InputHeight" class="col-sm-2 col-form-label">Рост</label>
            <div class="col-sm-10">
              <input type="text" class="form-control is-valid" name="InputHeight" placeholder="Введите рост">
            </div>
          </div>

          <div class="form-group row">
            <label for="InputWeight" class="col-sm-2 col-form-label">Вес</label>
            <div class="col-sm-10">
              <input type="text" class="form-control is-valid" name="InputWeight" placeholder="Введите вес">
            </div>
          </div>

          <div class="form-group row">
            <label for="InputSex" class="col-sm-2 col-form-label">Пол (муж/жен)</label>
            <div class="col-sm-10">
              <select class="form-control is-valid" name="InputSex">
                <option selected>Выберите пол</option>
                <option>муж</option>
                <option>жен</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="InputRase" class="col-sm-2 col-form-label">Раса</label>
            <div class="col-sm-10">
              <input type="text" class="form-control is-valid" name="InputRase" placeholder="Введите расу">
            </div>
          </div>

          <div class="form-group row">
            <label for="InputDate" class="col-sm-2 col-form-label">Дата</label>
            <div class="col-sm-10">
              <input type="date" class="form-control is-valid" name="InputDate" id="davaToday" placeholder="">
            </div>
          </div>

          <div class="form-group row">
            <label for="InputNameDoctor" class="col-sm-2 col-form-label">Имя доктора</label>
            <div class="col-sm-10">
              <input type="text" class="form-control is-valid" name="InputNameDoctor" placeholder="" value="Заведующий лабораторией генетики и геномики Застрожин М.С.">
            </div>
          </div>
           <!-- next and prev 
<div class="container">
  <div class="container_buttons">
      <div style="overflow:auto;">
  <div style="float:right;">
   <button type="button" id="prevBtn" onclick="nextPrev(-1)">Назад</button>
   <button type="submit" class="btn-report" id="generate-pdf1">Сформировать отчет</button>
  </div>
</div>
                  </div>
        </div>
-->
          <!--<button type="submit" class="btn btn-report" id="generate-pdf1">Сформировать отчет</button>-->
        </div>
        <!--

      <div class="form-group row">
        <label for="InputId" class="col-sm-2 col-form-label">ID*</label>
        <input type="text" name="InputId" class="form-control" value="ID">
      </div>

      <div class="form-group">
        <label for="InputSurname" class="col-sm-2 col-form-label">Фамилия*</label>
        <div class="col-sm-10">
        <input type="text" name="InputSurname" class="form-control" value="Иванов">
      </div>
      </div>

      <div class="form-group">
        <label for="InputFirstName">Имя*</label>
        <input type="text" name="InputFirstName" class="form-control" value="Иван">
      </div>

      <div class="form-group">
        <label for="InputSecondName">Отчество*</label>
        <input type="text" name="InputSecondName" class="form-control" value="Иванович">
      </div>

      <div class="form-group">
        <label for="InputBirth">Дата рождения*</label>
        <input type="date" name="InputBirth" class="form-control" value="01/01/1980">
      </div>

      <div class="form-group">
        <label for="InputHeight">Рост (см)*</label>
        <input type="text" name="InputHeight" class="form-control" value="180">
      </div>

      <div class="form-group">
        <label for="InputWeight">Вес (кг)*</label>
        <input type="text" name="InputWeight" class="form-control" value="80">
      </div>

      <div class="form-group">
        <label for="InputSex">Пол (м/ж)*</label>
        <input type="text" name="InputSex" class="form-control" value="м">
      </div>

<div class="form-group">
    <label for="InputSex">Пол (муж/жен)*</label>
    <select class="form-control" name="InputSex">
    <option selected>Выберите пол</option>
      <option>муж</option>
      <option>жен</option>
    </select>
  </div>
      <div class="form-group">
        <label for="InputRase">Раса*</label>
        <input type="text" name="InputRase" class="form-control" value="Европеоид">
      </div>

      <div class="form-group">
        <label for="InputDate">Дата*</label>
        <input type="date" name="InputDate" class="form-control" id="davaToday" value="">
      </div>
      
      <div class="form-group">
        <label for="InputNameDoctor">Имя доктора</label>
        <input type="text" name="InputNameDoctor" class="form-control" value="Застрожин Михаил Сергеевич, к.м.н.,
руководитель лаборатории генетики МНПЦ наркологии ДЗМ">
      </div>
    </div>
    -->
        <!-- <input type="submit" value="Сформировать отчет" id="generate-pdf1">-->
        
        <!-- next and prev -->
<!--<div class="container">-->
  <div class="container container_buttons">
      <div style="overflow:auto;">
  <div style="float:right;">
   <button type="button" id="prevBtn" onclick="nextPrev(-1)">Назад</button>
   <button type="submit" class="btn-report" id="generate-pdf1">Сформировать отчет</button>
  </div>
</div>
                  </div>
        <!--</div>-->
    </section>

    <?php 
  $CurrentDate = date('j/m/Y');
  ?>
  
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

  <!-- текущая дата в поле -->
  <script>
    document.getElementById('davaToday').valueAsDate = new Date();
  </script>

  <script>
    document.addEventListener('click', (e) => {
      // 
      if (e.target && e.target.className == 'accordion') {
        e.preventDefault();
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
  <script type="module" src="js/app.js" async="true"></script>
  <script src="js/steps.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.2/jspdf.plugin.autotable.min.js"></script> -->
  <!--<script src="js/form.js"></script>-->
</body>
</html>
