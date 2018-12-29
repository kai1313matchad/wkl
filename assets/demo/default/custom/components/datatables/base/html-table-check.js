//== Class definition

var DatatableHtmlTableDemo = function() {
  //== Private functions

  // demo initializer
  var demo = function() {

    var datatable = $('.m-datatable').mDatatable({
      data: {
        saveState: {cookie: false},
      },
      search: {
        input: $('#generalSearch'),
      },
      columns: [
        {
          field: 'RecordID',
          title: '#',
          sortable: false,
          width: 40,
          selector: {class: 'm-checkbox--solid m-checkbox--brand'},
          textAlign: 'center',
        },
      ],
    });

    $('input[type="checkbox"]').change(function() {
      $(this).prop("checked", $(this).prop("checked"))
    })

    $("#myform").on('submit', function(e){
      var form = this
      var rowsel = datatable.column(0).checkboxes.selected();
      $.each(rowsel, function(index, rowId){
        $(form).append(
          $('<input>').attr('type', 'hidden').attr('name', 'id[]').val(rowId)
        )
      })
      $('#view-rows').text(rowsel.join(","))
      $('#view-form').text($(form).serialize())
      $('input[name="id\[\]"]', form).remove()
      e.preventDefault()
    })
  };

  return {
    //== Public functions
    init: function() {
      // init dmeo
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  DatatableHtmlTableDemo.init();
});