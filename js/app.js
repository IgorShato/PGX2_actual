/**
 * Version 1.0.01
 */


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
    return Array.from(document.getElementsByClassName('list-group-item-all')).map((item) => {
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
    }, 250);
  }

  // load all gene data and display active gene data
  setTimeout(() => {
    AjaxQ.loadData('loadTable', getGenesData()); 
    displayTable($('.list-group.active').find('.list-group-item.active').text());
  }, 500)

  // gene categorie click event
  $(document).on('click', '.nav-link',  function(e){
    e.preventDefault();

    $('.list-group.active').toggleClass('active');
    $('.list-group[data-parent-id="'+ $(e.target).data('category-id') +'"]').toggleClass('active');

    displayTable($('.list-group.active').find('.list-group-item.active').text());
  })

  $(document).on('click', '.nav-link-dis', function(e){
    e.preventDefault();
    $('.list-group.active').toggleClass('active');
    $('.list-group[data-parent-id="'+ $(e.target).data('category-id') +'"]').toggleClass('active');
    console.log('click');
  })

  // gene click event
  $(document).on('click', '.list-group.active .list-group-item',  function(e) {
    e.preventDefault();
    console.log('ckicl');
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

  $(document).on('click', 'button.someclass', (e) => {
    if ($(e.target)[0].localName != 'input'){
      let catName = $(e.target)[0].dataset.specializationName.toLowerCase();
      let catData = $('.group-item[data-cat-name="'+ catName +'"]');

      $('.group-item.active').toggleClass('active');
      catData.toggleClass('active');
    }
  })

  /**
   * Checkbox click events
   */

  $(document).on('change', '.group-item.active .group_name input[type="checkbox"]',  function(e) {
    e.preventDefault();

    let label = $(e.target).next('label').attr("for", $(e.target)[0].id); 
    let inputsContainer = $('.group-item.active .supgroup_name').find('input[data-group-name="'+label[0].innerText + '"]');
    console.log(label)
    $.each($(inputsContainer), function (indexInArray, valueOfElement) { 
      if ($(e.target).prop('checked')){
        $(valueOfElement).prop('checked', true).change();
      }else{
        $(valueOfElement).prop('checked', false).change();
      }
    });
  })

  $(document).on('change', '.group-item.active .supgroup_name input[type="checkbox"]',  function(e) {
    e.preventDefault();

    let label = $(e.target).next('label').attr("for", $(e.target)[0].id); 
    let inputsContainer = $('.group-item.active .drugs_name').find('input[data-subgroup-id="' + label[0].htmlFor + '"]');
    // console.log(label);
    $.each($(inputsContainer), function (indexInArray, valueOfElement) { 
      if ($(e.target).prop('checked')){
        if ($(valueOfElement).hasClass('drug-checkbox')){
          $(valueOfElement).prop('checked', true).change();
        }else{
          $(valueOfElement).prop('checked', true);
        }
      }else{
        if ($(valueOfElement).hasClass('drug-checkbox')){
          $(valueOfElement).prop('checked', false).change();
        }else{
          $(valueOfElement).prop('checked', false);
        }
      }
    });
  })

  $(document).on('change', '.checkbox__modal',  function(e) {
    e.preventDefault();
    
    let groupItem = $('.group-item[data-cat-name="'+ $(e.target)[0].name +'"]');

    $.each(groupItem.find('.group_name input[type="checkbox"]'), function (indexInArray, valueOfElement) { 
      console.log(event);
      if ($(e.target).prop('checked')){
        console.log('Event add')
        $(valueOfElement).prop('checked', true).change();
      }else{
        console.log('Event delete')
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

    // console.log(activityValue);
    // console.log('index %d', activityIndex);

    let obj = [gen, cells[0].innerText, cells[1].innerText, cells[2].innerText, genotype, formKPolSum(activityValue)];

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
    console.log(columns);
  });

  $(document).on('change', '.select', (e) => {
    if (columns.length > 0){
      let rs = $(e.target).closest('tr')[0].cells[2].innerText;
      let newGenotype = $(e.target).val();
      let activityValue = 0;
      let activityIndex = $(e.target).find(":selected").index();
      let kPol = $(e.target).attr('k-pol');

      if (activityIndex == 1){
        activityValue = 25 * kPol;
      }else if (activityIndex == 2){
        activityValue = 50 * kPol;
      }

      let arrIndex = findRs(rs);

      if (arrIndex != undefined){
        columns[arrIndex][4] = newGenotype;
        columns[arrIndex][5] = formKPolSum(activityValue);

        console.log(columns);
      }
    }   
  })

  let findRs = (rs) => {
    for (let i = 0; i < columns.length; i++){
      if (columns[i][3] == rs){
        return i;
        break;
      }
    }
    return undefined;
  }

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

  let formKPolSum = (activityValue) => {
    switch (activityValue) {
      case 0:
        return 'N';
        break;
      case 25:
        return '&darr;';
        break;
      case 50:
        return '&darr;&darr;';
        break;
      case -25:
        return '&uarr;';
        break;
      case -50:
        return '&uarr;&uarr;';
        break;
      default:
        break;
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

/**
 * 
 */

  let findDrugGroup = (groupName) => {
    for (let i = 0; i < drugsArr.length; i++){
      if (drugsArr[i].drugGroup == groupName){
        return i;
      }
    }
    return undefined;
  }

  let findDrugCat = (groupIndex, catName) => {
    for (let i = 0; i < drugsArr[groupIndex].categories.length; i++){
      if (drugsArr[groupIndex].categories[i].catName == catName){
        return i;
      }
    }
    return undefined;
  }

  let findDrug = (groupIndex, catIndex, drugName) => {
    for (let i = 0; i < drugsArr[groupIndex].categories[catIndex].drugs.length; i++){
      if (drugsArr[groupIndex].categories[catIndex].drugs[i].name == drugName){
        return i;
      }
    }
    return undefined;
  }

  let getDrugKPolSum = (enzyme) => {
    let genKPolSum = 0;

    if ($(enzyme).data('enzyme').split(',')[0] != ''){
      this.enzyme = $(enzyme).data('enzyme').split(',');

      this.enzyme.forEach((item, index) => {
        let genIndex = findGen(item);
        
        if (genIndex != undefined){
          genKPolSum = genKPolSum + kPolSumArr[genIndex].kPolSum;
        }
      })
    }else{
      genKPolSum = 0;
    }

    return formEnzyme(genKPolSum);
  }

  let formEnzyme = (activityValue) => {
    switch (true) {
      case activityValue == 0:
        return 'Стандартная доза';
        break;
      case activityValue > 0 && activityValue <= 25:
        return '<span style="color:#FF6C18;">Снизить дозу на 25%</span>';
        break;
      case activityValue >= 50:
        return '<span style="color:#FF1837;">Заменить</span>';
        break;
      case activityValue <= -25 && activityValue > -50:
        return '<span style="color:#FF6C18;">Повысить дозу на 25%</span>';
        break;
      case activityValue <= -50:
        return '<span style="color:#FF1837;">Заменить</span>';
        break;
      default:
        break;
    }
  }

  let formAction = (enzyme) => {
    let intersection = kPolSumArr.filter(element => enzyme.includes(element.gen));
    let sum = intersection.reduce((acc, val) => { return acc + val.kPolSum; }, 0);

    switch (true) {
      case sum == 0:
        return 'N';
        break;
      case sum == 25:
        return '&darr;';
        break;
      case sum >= 50:
        return '&darr;&darr;';
        break;
      case sum == -25:
        return '&uarr;';
        break;
      case sum <= -50:
        return '&uarr;&uarr;';
        break;
      default:
        break;
    }
  }

  let drugsArr = new Array();

  $(document).on('change', '.drug-checkbox',  function(e) {
    let drug = $('label[for="'+$(e.target).attr("name")+'"]')[0];
    let drugName = $('label[for="'+$(e.target).attr("name")+'"]')[0].innerText;
    let drugCategory = $(e.target)[0].dataset.subgroupName;
    let drugGroup= $('#' + $('.subgroup-item[for="'+ $(e.target)[0].dataset.subgroupId +'"]')[0].htmlFor)[0].dataset.groupName;
    let drugEnzyme = $(drug).data('enzyme').split(',');
    let drugPharmGene = () => {
      if ($('label[for="'+$(e.target).attr("name")+'"]')[0].dataset.pharmacodynamicGene){
        return $('label[for="'+$(e.target).attr("name")+'"]')[0].dataset.pharmacodynamicGene;
      }else{
        return '&mdash;'
      }  
    }
    console.log(drugGroup);
    if (e.target.checked){
      let groupIndex = findDrugGroup(drugGroup);
      if (groupIndex != undefined){
  
        let catIndex = findDrugCat(groupIndex, drugCategory);
        if (catIndex != undefined){
  
          let drugIndex = findDrug(groupIndex, catIndex, drugName);
          if (drugIndex == undefined){
            drugsArr[groupIndex].categories[catIndex].drugs.push({
              name: drugName,
              geneSum: getDrugKPolSum(drug),
              pharmGene: drugPharmGene(),
              enzyme: drugEnzyme.join(),
              fcAction: formAction(drugEnzyme),
              fdAction: formAction($('label[for="'+$(e.target).attr("name")+'"]')[0].dataset.pharmacodynamicGene)
            })
          }
        }else{
          drugsArr[groupIndex].categories.push({
            catName: drugCategory,
            drugs: [
              {
                name: drugName,
                geneSum: getDrugKPolSum(drug),
                pharmGene: drugPharmGene(),
                enzyme: drugEnzyme.join(),
                fcAction: formAction(drugEnzyme),
                fdAction: formAction($('label[for="'+$(e.target).attr("name")+'"]')[0].dataset.pharmacodynamicGene)
              }
            ]
          })
        }
      }else{
        drugsArr.push(
          {
            drugGroup: drugGroup,
            categories: [
              {
                catName: drugCategory,
                drugs: [
                  {
                    name: drugName,
                    geneSum: getDrugKPolSum(drug),
                    pharmGene: drugPharmGene(),
                    enzyme: drugEnzyme.join(),
                    fcAction: formAction(drugEnzyme),
                    fdAction: formAction($('label[for="'+$(e.target).attr("name")+'"]')[0].dataset.pharmacodynamicGene)
                  }
                ]
              }
            ]
          }
        )
      }
    }else{
      console.log($(e.target))
      let groupIndex = findDrugGroup(drugGroup);

      if (groupIndex != undefined){
        let catIndex = findDrugCat(groupIndex, drugCategory);
        
        if (catIndex != undefined){
          let drugIndex = findDrug(groupIndex, catIndex, drugName);

          if (drugIndex != undefined){
            if (drugsArr[groupIndex].categories[catIndex].drugs.length <= 1){
              drugsArr[groupIndex].categories.splice(catIndex, 1);
            }else{
              drugsArr[groupIndex].categories[catIndex].drugs.splice(drugIndex, 1);
            }
          }
        }
      }

      console.log(drugsArr[groupIndex]);
      if (drugsArr[groupIndex].categories.length == 0){
        drugsArr.splice(groupIndex, 1);
      }
    }

    console.log(drugsArr);
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

  let dynamicArr = new Array();
  let dynamicDrugGroups = new Array();
  let dynamicFlag = false;

  let dynamicText = () => {
    clearArray(dynamicArr);
    clearArray(dynamicDrugGroups);
    dynamicFlag = false;

    for (let i = 0; i < columns.length; i++){
      if (columns[i][5] != 'N'){
        dynamicArr.indexOf(columns[i][0]) === -1 ? dynamicArr.push(columns[i][0]) : '';

        if (dynamicFlag == false){
          dynamicFlag = true;
        }
      }
    }

    if (dynamicFlag == true){
      for (let i = 0; i < drugsArr.length; i++){
        for (let j = 0; j < drugsArr[i].categories.length; j++){
          for (let k = 0; k < drugsArr[i].categories[j].drugs.length; k++){
            let dynamicEnzym = drugsArr[i].categories[j].drugs[k].enzyme.split(',');

            dynamicEnzym.forEach(element => {
              let dynIndex = dynamicArr.indexOf(element)

              console.log(element);
              console.log(dynamicDrugGroups);
              if (dynIndex != -1 && dynamicDrugGroups.indexOf(drugsArr[i].drugGroup.toLowerCase()) == -1){
                dynamicDrugGroups.push(drugsArr[i].drugGroup.toLowerCase());
              }
            });
          }
        }
      }
    }
  }

  document.getElementById('generate-pdf1').addEventListener('click',  function(e) {
    e.preventDefault();

    let formData = $('#pdf-form').serialize();
    dynamicText();

    console.log(dynamicFlag);
    console.log(dynamicDrugGroups);

    $.ajax({   
      url: 'report.php',
      type: 'POST',
      xhrFields: {
        responseType: 'blob'
      },
      data: {
        formData: formData,
        columns: columns,
        drugs: drugsArr,
        kPolSum: kPolSumArr,
        dynamicText: {flag: dynamicFlag, dynamicDrugGroups: dynamicDrugGroups}
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
  
  $('.list').on('click', '#flag', function(){
    $('.list #flag').removeClass('active');
    $(this).addClass('active');
});
  
}); 

