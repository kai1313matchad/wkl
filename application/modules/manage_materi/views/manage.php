<!-- <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
	<div class="m-alert__icon">
		<i class="flaticon-exclamation m--font-brand"></i>
	</div>
	<div class="m-alert__text">
		The Metronic Datatable component supports initialization from HTML table. It also defines the schema model of the data source. In addition to the visualization, the Datatable provides built-in support for operations over data such as sorting, filtering and paging performed in user browser(frontend).
	</div>
</div> -->
<!-- alert -->
<?php 
if (isset($flash)) {
	echo $flash;
}
?>

<style type="text/css">
.seal {
	font-weight: bold;
	color: #ff6000;
}	
</style>

<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Database Materi
				</h3>
			</div>
			
		</div>
		<div class="m-portlet__head-tools">
			
			<a href="<?= base_url() ?>manage_materi/show_archived" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-check-square"></i>
					<span>
						Archive Data
					</span>
				</span>
			</a>
			
		</div>
	</div>

<?php
	$create_review_url = base_url()."review/create";
?>

	<div class="m-portlet__body">
		<!--begin: Search Form -->
		<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
			<div class="row align-items-center">
				<div class="col-xl-8 order-2 order-xl-1">
					<div class="form-group m-form__group row align-items-center">
						<div class="col-md-4">
							<div class="m-input-icon m-input-icon--left">
								<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
								<span class="m-input-icon__icon m-input-icon__icon--left">
									<span>
										<i class="la la-search"></i>
									</span>
								</span>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="col-xl-4 order-1 order-xl-2 m--align-right">
					<a href="<?= $create_review_url ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-plus-square"></i>
							<span>
								Tambah Review
							</span>
						</span>
					</a>
					<div class="m-separator m-separator--dashed d-xl-none"></div>
				</div> -->
			</div>
		</div>
		<!--end: Search Form -->
<!--begin: Datatable -->
		<div class="m_datatable" id="local_data"></div>
		<!--end: Datatable -->
	</div>
</div>


<script>

// auto load

setTimeout(gettabel, 3000);

	function gettabel(){
        jQuery.ajax({
            type: 'POST',
            url: '<?= base_url() ?>manage_materi/getData',  
            dataType: 'json',
            success: function (resp) {
                loadtabel(resp);
            },
           	error: function (xhr,status,error) {             
                swal("Data tidak ditemukan!","Silahkan cek database","warning")
            }
        });
    }

    function loadtabel(data){

        var DatatableDataLocalDemo={init:function(){           

        $('.m_datatable').mDatatable('destroy');
        var d=$(".m_datatable").mDatatable({data:{type:"local",source:data,pageSize:10},
            layout:{
                theme:"default","class":"",scroll:!1,footer:!1},
                sortable:!0,pagination:!0,search:{input:$("#generalSearch")},
                columns:[

		            {field:"#", width:30, sortable:!1, textAlign:"center", title:"#"},
		            {field:"Order", sortable:!1, textAlign:"left", title:"Order"},
		            {field:"Lokasi", sortable:!1, textAlign:"left", title:"Lokasi"},
		            {field:"Klien", sortable:!1, textAlign:"left", title:"Klien"},
		            {field:"Owner", sortable:!1, textAlign:"left", title:"Owner"},
		            {field:"Materi", sortable:1, textAlign:"left", title:"Materi"},
		            // {field:"Select", sortable:!1, textAlign:"right", title:"Select"},
		            {field:"Status", sortable:1, textAlign:"center", title:"Status"},
		            {field:"Tanggal", sortable:1, textAlign:"center", title:"Tanggal"},
		            {field:"Aksi", sortable:!1, textAlign:"center", title:"Aksi"},

            	]
            });
        a=d.getDataSourceQuery();
        $("#m_form_status").on("change",function(){d.search($(this).val(),"aktif")}).val(void 0!==a.aktif?a.aktif:"");
        $("#m_form_type").on("change",function(){d.search($(this).val(),"Type")}).val(void 0!==a.Type?a.Type:"");
        $("#m_form_status, #m_form_type").selectpicker()}};jQuery(document).ready(function(){DatatableDataLocalDemo.init()});

    }


    function hapus_dokumen(id){
		swal({
			title: "Yakin menghapus data?",
			text: "Data dan File akan terhapus permanen!",
			type: "warning",
			showCancelButton:!0,confirmButtonText:"Ya, Hapus!!"
		})
		.then(function(e){
			e.value&&
		  	$.ajax({
	        type : "POST",
	        url  : "<?php echo base_url()?>manage_materi/delete/" + id ,
	        // dataType : "JSON",
	                // data : {kode: kode},
	                success: function(data){
	                        swal({
							  title: "Berhasil dihapus!",
							  text: "Data dan File Berhasil dihapus",
							  type: "success",
							});
	                        gettabel();
	                }
            });
		})
    }
</script>

<script type="text/javascript">
    function showAjaxModal(url)
    {
        // SHOWING AJAX loader-1 IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>marketplace/images/loading.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
        
        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#modal_ajax .modal-content').html(response);

            }
        });
    }

    function showAjaxModal2(url)
    {
        // SHOWING AJAX loader-1 IMAGE
        jQuery('#m_modal_4 .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>marketplace/images/loading.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#m_modal_4').modal('show', {backdrop: 'true'});
        
        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#m_modal_4 .modal-content').html(response);
                $('#summernote').summernote({
                	height: 200,
			    	dialogsInBody: true
			    });
            }
        });
    }
    </script>
    
    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
			</div>
		</div>
	</div>

	<!-- modal width -->

    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				
			</div>
		</div>
	</div>
    
    <!-- end modal width -->