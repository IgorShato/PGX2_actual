
$(document).ready(function(){
  let data = new Array();

  /**
   * Loading data
   */

  let loadData = (action, data) => {
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

  let getAllPillsCategories = () => {
    let pillsCategoriesId = new Array();

    $.each($('.nav-link'), (indexInArray, valueOfElement) => {
      pillsCategoriesId.push($(valueOfElement).data('category-id'));
    });
    
    return pillsCategoriesId;
  }

  loadData('loadCategories', getAllPillsCategories());

  // Load data when application starts
  // loadData('loadCategories', new Array({idCategory : 1})); 
  // setTimeout( () => { 
  //   loadData('loadTable', new Array({geneName : $('.list-group-item.active').text()}));
  // }, 50);

  let getAllTransportCategories = () => {
    let transportCategories = new Array();

    $.each($('.list-group-item'), (indexInArray, valueOfElement) => {
      transportCategories.push($(valueOfElement).text());
    });

    return transportCategories;
  }

  setTimeout( () => { 
    loadData('loadTable', getAllTransportCategories()); 
    displayTable($('.list-group.active').find('.list-group-item.active').text());
  }, 50);
  
  let getAllDrugGroups = () => {
    let drugGroupsArr = new Array();

    $.each($('.someclass'), (indexInArray, valueOfElement) => { 
       drugGroupsArr.push($(valueOfElement).data('specialization-name').toLowerCase());
    });

    return drugGroupsArr;
  }

  loadData('loadPops', getAllDrugGroups());
  
  $(document).on('click', '.nav-link', (e) => {
    e.preventDefault();

    $('.list-group.active').toggleClass('active');
    $('.list-group[data-parent-id="'+ $(e.target).data('category-id') +'"]').toggleClass('active');

    displayTable($('.list-group.active').find('.list-group-item.active').text());
  })

  $(document).on('click', '.list-group-item', (e) => {
    e.preventDefault();

    displayTable($(e.target).text());
  });

  let displayTable = (curCategory) => {
    setTimeout( () => { 
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

  let clearArray = (arr) => {
    arr.splice(0, arr.length);
  }

  /**
   * Checkbox click events
   */

  $(document).on('change', 'input[type="checkbox"][data-collapse="true"]', (e) => {
  e.preventDefault();
  
  let inputscontainer = $(e.target).closest('.card').find('#' + $(e.target).data('collapse-target'));

  $.each($(inputscontainer).find('input[type="checkbox"]'), function (indexInArray, valueOfElement) { 
    if ($(e.target).prop('checked')){
      $(valueOfElement).prop('checked', true);
    }else{
      $(valueOfElement).prop('checked', false);
    }
  });
  })

  $(document).on('change', '.checkbox__modal', (e) => {
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

    let obj = [gen, cells[0].innerText, cells[1].innerText, cells[2].innerText, genotype];

    if(this.checked) {
      columns.push(obj);
    }else{
      columns.forEach((element, index) => {
        if (element.toString() == obj.toString()){
          columns.splice(index, 1);
          return false;
        }
      });
    }
  });

  let drugs = new Array();

  $(document).on('change', '.drug-checkbox', (e) => {
    let drugName = $('label[for="'+$(e.target).attr("name")+'"]')[0].innerText;

    let obj = [drugName];

    if(e.target.checked){
      drugs.push(obj);
    }else{
      drugs.forEach((element, index) => {
        if (element.toString() == obj.toString()){
          drugs.splice(index, 1);
          return false;
        }
      });
    }
  });
 
  // $('#generate-pdf').on('click', (e) => {
  //   e.preventDefault();

  //   // console.log('generating...');

  //   // let tables = document.getElementsByClassName('')
   

  //   // columns.push();

  //   // let pdf = new jsPDF();

  //   // pdf.autoTable({
  //   //   head: [['Gen', 'Polymorphism', 'Allele', 'RS', 'Genotype']],
  //   //   columnStyles: { 0: { halign: 'center', fillColor: [94, 172, 159] },  },
  //   //   body: columns,
  //   //   styles: {
  //   //     halign: 'center',
  //   //     valign: 'middle'
  //   //   },
  //   // });
  //   // pdf.output('save', 'table.pdf');
  // });

  document.getElementById('generate-pdf1').addEventListener('click', (e) => {
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
        drugs: drugs
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

}); 

