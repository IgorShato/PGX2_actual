
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
        $(valueOfElement).prop('checked', true);
      }else{
        $(valueOfElement).prop('checked', false);
      }
    });
   })

}); 
