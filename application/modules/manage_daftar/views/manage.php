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
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Database Persil (Pemilik titik)
				</h3>
			</div>
			
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
						<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
							<i class="la la-ellipsis-h m--font-brand"></i>
						</a>
						<div class="m-dropdown__wrapper">
							<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
							<div class="m-dropdown__inner">
								<div class="m-dropdown__body">
									<div class="m-dropdown__content">
										<ul class="m-nav">
											<li class="m-nav__section m-nav__section--first">
												<span class="m-nav__section-text">
													Quick Actions
												</span>
											</li>
											<li class="m-nav__item">
												<a href="" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-share"></i>
													<span class="m-nav__link-text">
														Create Post
													</span>
												</a>
											</li>
											<li class="m-nav__item">
												<a href="" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-chat-1"></i>
													<span class="m-nav__link-text">
														Send Messages
													</span>
												</a>
											</li>
											<li class="m-nav__item">
												<a href="" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-multimedia-2"></i>
													<span class="m-nav__link-text">
														Upload File
													</span>
												</a>
											</li>
											<li class="m-nav__section">
												<span class="m-nav__section-text">
													Useful Links
												</span>
											</li>
											<li class="m-nav__item">
												<a href="" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-info"></i>
													<span class="m-nav__link-text">
														FAQ
													</span>
												</a>
											</li>
											<li class="m-nav__item">
												<a href="" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-lifebuoy"></i>
													<span class="m-nav__link-text">
														Support
													</span>
												</a>
											</li>
											<li class="m-nav__separator m-nav__separator--fit m--hide"></li>
											<li class="m-nav__item m--hide">
												<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
													Submit
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>

<?php
	$create_daftar_url = base_url()."manage_daftar/create";
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
				<div class="col-xl-4 order-1 order-xl-2 m--align-right">
					<a href="<?= $create_daftar_url ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-plus-square"></i>
							<span>
								Tambah Persil
							</span>
						</span>
					</a>
					<div class="m-separator m-separator--dashed d-xl-none"></div>
				</div>
			</div>
		</div>
		<!--end: Search Form -->

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
            url: '<?= base_url() ?>manage_daftar/getData',  
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

		            {field:"No", width:30, sortable:!1, textAlign:"center", title:"No"},
		            {field:"#", width:30, sortable:!1, textAlign:"center", title:"#"},
		            {field:"Nama", sortable:1, textAlign:"left", title:"Nama"},
		            {field:"Company", sortable:1, textAlign:"left", title:"Company"},
		            {field:"Email", sortable:!1, textAlign:"left", title:"Email"},
		            {field:"Telpon", sortable:1, textAlign:"left", title:"Telpon"},
		            {field:"Alamat", sortable:!1, textAlign:"left", title:"Alamat"},
		            {field:"Point", sortable:!1, textAlign:"left", title:"Point"},
		            {field:"Status", sortable:1, textAlign:"center", title:"Status"},
		            {field:"Tanggal", sortable:1, textAlign:"center", title:"Tanggal"},
		            {field:"Last Login", sortable:1, textAlign:"center", title:"Last Login"},
		            {field:"Aksi", sortable:1, textAlign:"center", title:"Aksi"},
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
	        url  : "<?php echo base_url()?>manage_daftar/delete/" + id ,
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