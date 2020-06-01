
/**
 * Import
 */

import * as AjaxQ from './modules/ajax.js';


$(document).ready(function(){

  let data = new Array();

  /**
   * Clear array
   */

  let clearArray =  function(arr) {
    arr.splice(0, arr.length);
  }


  /**
   * Step 1
   */

  // get all gen categories
  let getPillsCategories = () => {
    return Array.from(document.getElementsByClassName('nav-link')).map((item) => {
      return item.dataset.categoryId;
    })
  }

  // load all genes
  AjaxQ.loadData('loadCategories', getPillsCategories());

  // get all genes
  let getGenesData = () => {
    return Array.from(document.getElementsByClassName('list-group-item')).map((item) => {
      return item.innerText;
    })
  }

  // display gene data
  let displayTable =  function(curCategory) {
    setTimeout(  function() { 
      if ($('.tab-pane[role="tablepanel"]').hasClass('active')){
        $('.tab-pane[role="tablepanel"].active').removeClass('active');
        $('.tab-pane[data-category-name="'+ curCategory +'"]').addClass('active');
      }else{
        $('.tab-pane[data-category-name="'+ curCategory +'"]').addClass('active');
      }
    }, 100);
  }

  // load all gene data and display active gene data
  setTimeout(() => {
    AjaxQ.loadData('loadTable', getGenesData()); 
    displayTable($('.list-group.active').find('.list-group-item.active').text());
  }, 50)

  // gene categorie click event
  $(document).on('click', '.nav-link',  function(e){
    e.preventDefault();

    $('.list-group.active').toggleClass('active');
    $('.list-group[data-parent-id="'+ $(e.target).data('category-id') +'"]').toggleClass('active');

    displayTable($('.list-group.active').find('.list-group-item.active').text());
  })

  // gene click event
  $(document).on('click', '.list-group-item',  function(e) {
    e.preventDefault();

    displayTable($(e.target).text());
  });


  /**
   * Step 2
   */
  
  // get drug groups
  let getAllDrugGroups =  function() {
    return Array.from(document.getElementsByClassName('someclass')).map((item) => {
      return item.dataset.specializationName;
    })
  }

  // load drug pops data
  AjaxQ.loadData('loadPops', getAllDrugGroups());

  /**
   * Checkbox click events
   */

  $(document).on('change', 'input[type="checkbox"][data-collapse="true"]',  function(e) {
    e.preventDefault();

    let inputsContainer = $(e.target).closest('.card').find('#' + $(e.target).data('collapse-target'));

    $.each($(inputsContainer).find('input[type="checkbox"]'), function (indexInArray, valueOfElement) { 
      if ($(e.target).prop('checked')){
        $(valueOfElement).prop('checked', true);
      }else{
        $(valueOfElement).prop('checked', false);
      }
    });
  })

  $(document).on('change', 'input[type="checkbox"][data-collapse="true"].panel-collapse',  function(e) {
    e.preventDefault();

    let panelContainer = $(e.target).closest('.card-body').find('[panel-id='+$(e.target).data('collapse-target-panel')+']');

    $.each($(panelContainer).find('input[type="checkbox"]'), function (indexInArray, valueOfElement) { 
      if ($(e.target).prop('checked')){
        $(valueOfElement).prop('checked', true);
      }else{
        $(valueOfElement).prop('checked', false);
      }
    });
  })

  $(document).on('change', '.checkbox__modal',  function(e) {
  e.preventDefault();
  
  let modal = $('#' + $(e.target).attr('name'));
  
  $.each(modal.find('input[type="checkbox"]'), function (indexInArray, valueOfElement) { 
    if ($(e.target).prop('checked')){
      $(valueOfElement).prop('checked', true).change();
    }else{
      $(valueOfElement).prop('checked', false).change();
    }
  });
  });

  let columns = new Array();

  $(document).on('change', '.checkbox2', function() {
    let cells = $(this).closest('tr')[0].cells;
    let gen = $(this).closest('.tab-pane').data('category-name');
    let genotype = $(cells[3]).find('.select').val();
    let activityIndex = $(cells[3]).find('.select').find(":selected").index();
    let activityValue = 0;
    let kPol = $(cells[3]).find('.select').attr('k-pol');

    if (activityIndex == 1){
      activityValue = 25 * kPol;
    }else if (activityIndex == 2){
      activityValue = 50 * kPol;
    }

    console.log(activityValue);
    console.log('index %d', activityIndex);

    let obj = [gen, cells[0].innerText, cells[1].innerText, cells[2].innerText, genotype, activityValue];

    if(this.checked) {
      columns.push(obj);
      kPolSum($('.list-group.active').find('.list-group-item.active').text(), activityValue);
    }else{
      columns.forEach( function(element, index){
        if (element.toString() == obj.toString()){
          columns.splice(index, 1);

          let genArrIndex = findGen($('.list-group.active').find('.list-group-item.active').text());
          if (genArrIndex != undefined){
            kPolSumArr[genArrIndex].kPolSum -= activityValue;
            if (kPolSumArr[genArrIndex].kPolSum == 0){
              kPolSumArr.splice(genArrIndex, 1);
            }
          }
          return false;
        }
      });
    }
    console.log(kPolSumArr);
  });

  let kPolSumArr = new Array();

  let kPolSum = (gen, activityValue) => {
    let genArrIndex = findGen(gen);

    if (genArrIndex != undefined){
      kPolSumArr[genArrIndex].kPolSum += activityValue
    }else{
      kPolSumArr.push({
        gen: gen,
        kPolSum: activityValue
      })
    }
  }

  let findGen = (name) => {
    for (let i = 0; i < kPolSumArr.length; i++){
      if (kPolSumArr[i].gen == name){
        return i;
        break;
      }
    }
    return undefined;
  }

  let drugs = new Array();

  $(document).on('change', '.drug-checkbox',  function(e) {
    let drug = $('label[for="'+$(e.target).attr("name")+'"]')[0];
    let drugName = $('label[for="'+$(e.target).attr("name")+'"]')[0].innerText;
    
    if ($(drug).data('enzyme').split(',')[0] != ''){
      drug = $(drug).data('enzyme').split(',');
    }else{
      drug = null;
    }
    
    let obj = {
      name: drugName,
      enzyme: drug
    }

    if(e.target.checked){
      drugs.push(obj);
    }else{
      drugs.forEach( function(element, index){
        if (element.toString() == obj.toString()){
          drugs.splice(index, 1);
          return false;
        }
      });
    }
  });

  // document.getElementById('generate-pdf1').addEventListener('click',  function(e) {
  //   e.preventDefault();

  //   let formData = $('#pdf-form').serialize();

  //   $.ajax({   
  //     url: 'report.php',
  //     type: 'POST',
  //     dataType: 'json',
  //     data: {
  //       formData: formData,
  //       columns: columns,
  //       drugs: drugs,
  //       kPolSum: kPolSumArr
  //     },
  //     success: function(res){
  //       console.log(res);
        
  //     },
  //     error: function(jqxhr, status, exception) {
  //       console.log('Exception:', exception);
  //     }
  //   }); 
  // });

  document.getElementById('generate-pdf1').addEventListener('click',  function(e) {
    e.preventDefault();

    let formData = $('#pdf-form').serialize();
    let drugData = formDrugsArr();

    $.ajax({   
      url: 'report.php',
      type: 'POST',
      xhrFields: {
        responseType: 'blob'
      },
      data: {
        formData: formData,
        columns: columns,
        drugs: drugData,
        kPolSum: kPolSumArr
      },
      success: function(res){
        console.log(res);
        
        let link = document.createElement('a');

        link.href = window.URL.createObjectURL(res);
        link.setAttribute('target', '_blank');
        // link.download= 'table.pdf';
        link.click();
      },
      error: function(jqxhr, status, exception) {
        console.log('Exception:', exception);
      }
    }); 
  });

  let drugsArr = new Array();

  let formDrugsArr = () => {
    // console.log(drugs);
    // console.log(kPolSumArr);

    drugs.forEach((item, index) => {
      let obj = {
        name: item.name,
        geneSum: 0
      };

      if (item.enzyme != null){
        item.enzyme.forEach((item, index) => {
          let genIndex = findGen(item);

          if (genIndex != undefined){
            obj.geneSum = obj.geneSum + kPolSumArr[genIndex].kPolSum;
          }
        })
      }

      if (obj.geneSum == 0){
        obj.geneSum = 'N';
      }
      
      drugsArr.push(obj);
    })

    return drugsArr;
  }
  

  let formRecommendationTableData = (kPolSumArr, drugsArr) => {

  }
}); 
