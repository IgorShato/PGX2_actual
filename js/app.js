
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
          $('.list-group').html(response.data);
        }else if (response.type == 'tableData'){
          $('.tab-pane').find('table').find('tbody').html(response.data);
        } else if (response.type = 'popsData'){
          $('.modals').html(response.data);
        }
        
        clearArray(data);
      }  
    }); 
  }

  // Load data when application starts
  loadData('loadCategories', new Array({idCategory : 1})); 
  setTimeout( () => { 
    loadData('loadTable', new Array({geneName : $('.list-group-item.active').text()}));
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

    data.push({ 
      idCategory : $(e.target).data('category-id') 
    });

    loadData('loadCategories', data);
    setTimeout( () => { 
      loadData('loadTable', new Array({geneName : $('.list-group-item.active').text()}));
    }, 50);
  })

  $(document).on('click', '.list-group-item', (e) => {
    e.preventDefault();

    data.push({
      geneName : $(e.target).text()
    });

    loadData('loadTable', data);
  });

  /**
   * Clear array
   */

  let clearArray = (arr) => {
    arr.splice(0, arr.length);
  }

}); 
