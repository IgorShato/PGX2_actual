
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
    }  
  }); 
}

export {loadData};