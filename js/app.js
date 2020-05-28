
$(document).ready(function(){

  setTimeout( () => {  

    let data = new Array();
    /**
     * Loading data
     */

    let loadData = function (action, data){
      $.ajax({   
        url: 'ajax.php',
        type: 'POST',
        dataType : 'json',
        data: {
          action : action,
          data : data
        },
        success: function(response) {
          if(response.type == 'categories'){
            $('.list-group__container').html(response.data);
          }else if (response.type == 'tableData'){
            $('#nav-tabContent').html(response.data);
          } else if (response.type = 'popsData'){
            $('.modals').html(response.data);
          }
          
          clearArray(data);
        }  
      }); 
    }

    let getAllPillsCategories =  function() {
      let pillsCategoriesId = new Array();

      $.each($('.nav-link'),  function(indexInArray, valueOfElement) {
        pillsCategoriesId.push($(valueOfElement).data('category-id'));
      });
      
      return pillsCategoriesId;
    }

    loadData('loadCategories', getAllPillsCategories());

    //Load data when application starts
    loadData('loadCategories', new Array({idCategory : 1})); 
    setTimeout( () => { 
      loadData('loadTable', new Array({geneName : $('.list-group-item.active').text()}));
    }, 50);

    let getAllTransportCategories =  function() {
      let transportCategories = new Array();

      $.each($('.list-group-item'),  function(indexInArray, valueOfElement) {
        transportCategories.push($(valueOfElement).text());
      });

      return transportCategories;
    }

    setTimeout(  function() { 
      loadData('loadTable', getAllTransportCategories()); 
      displayTable($('.list-group.active').find('.list-group-item.active').text());
    }, 50);
    
    let getAllDrugGroups =  function() {
      let drugGroupsArr = new Array();

      $.each($('.someclass'),  function(indexInArray, valueOfElement) { 
        drugGroupsArr.push($(valueOfElement).data('specialization-name').toLowerCase());
      });

      return drugGroupsArr;
    }

    loadData('loadPops', getAllDrugGroups());
    
    $(document).on('click', '.nav-link',  function(e){
      e.preventDefault();

      $('.list-group.active').toggleClass('active');
      $('.list-group[data-parent-id="'+ $(e.target).data('category-id') +'"]').toggleClass('active');

      displayTable($('.list-group.active').find('.list-group-item.active').text());
    })

    $(document).on('click', '.list-group-item',  function(e) {
      e.preventDefault();

      displayTable($(e.target).text());
    });

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

    /**
     * Clear array
     */

    let clearArray =  function(arr) {
      arr.splice(0, arr.length);
    }

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
      let drugName = $('label[for="'+$(e.target).attr("name")+'"]')[0].innerText;

      let obj = [drugName];

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

      $.ajax({   
        url: 'report.php',
        type: 'POST',
        xhrFields: {
          responseType: 'blob'
        },
        data: {
          formData: formData,
          columns: columns,
          drugs: drugs,
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
  }, 100);
}); 

