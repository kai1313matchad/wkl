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
					Monitor
				</h3>
			</div>
			
		</div>
		<div class="m-portlet__head-tools">
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
							<i class="la la-refresh"></i>
							<span>
								Refresh
							</span>
						</span>
					</a>
					<div class="m-separator m-separator--dashed d-xl-none"></div>
				</div>
			</div>
		</div>
		<!--end: Search Form -->
<!--begin: Datatable -->

		<table class="m-datatable" id="html_table" width="100%">
			<thead>
				<tr>
					<th title="Field #1">
						#
					</th>
					<th title="Field #2">
						Tanggal
					</th>
					<th title="Field #3">
						Nama
					</th>
					<th title="Field #4">
						IP Address
					</th>
					
					<th title="Field #6">
						Browser
					</th>
					<th>
						Platform
					</th>
					<th title="Field #7">
						Aksi
					</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
			    foreach($users->result() as $row) {
			        $session_data = $row->data;
			        $return_data = array();
			        $offset = 0;
			        while ($offset < strlen($session_data)) {
			            if (!strstr(substr($session_data, $offset), "|")) {
			                throw new Exception("invalid data, remaining: " . 
			                substr($session_data, $offset));
			            }
			            $pos = strpos($session_data, "|", $offset);
			            $num = $pos - $offset;
			            $varname = substr($session_data, $offset, $num);
			            $offset += $num + 1;
			            $data = unserialize(substr($session_data, $offset));
			            $return_data[$varname] = $data;
			            $offset += strlen(serialize($data));
			        }
				?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= date("d-m-Y H:i:s", $return_data['__ci_last_regenerate']) ?></td>
					<td><?= $return_data['namapengguna'] ?></td>
					<td><?= $row->ip_address ?></td>
					<td><?= $return_data['browser'] ?></td>
					<td><?= $return_data['platform'] ?></td>
					<td>
						<span style="overflow: visible; width: 110px;">	
							<button onclick="hapus_dokumen('<?= $row->id ?>')" class="btn btn-danger m-btn m-btn--icon">
								<span>
									<i class="la la-warning"></i>
									<span>
										Logout
									</span>
								</span>
							</button>				
						</span>
					</td>
				</tr>

				<?php } ?>
			</tbody>
		</table>

		<div class="m_datatable" id="local_data2"></div>

		<!--end: Datatable -->
	</div>
</div>


<script>

// auto load

setTimeout(gettabel, 3000);

	function gettabel2(){
        jQuery.ajax({
            type: 'POST',
            url: '<?= base_url() ?>monitoring/getData',  
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
		            {field:"Tanggal", sortable:1, textAlign:"center", title:"Tanggal"},
		            {field:"Nama", sortable:1, textAlign:"left", title:"Nama"},
		            {field:"IP Address", sortable:1, textAlign:"left", title:"IP Address"},
		            {field:"Browser", sortable:!1, textAlign:"left", title:"Browser"},
		            {field:"Platform", sortable:1, textAlign:"left", title:"Platform"},		            
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
		        url  : "<?php echo base_url()?>monitoring/logout_user/",
		        // dataType : "JSON",
		        data : {id: id},
	            success: function(data){
	                swal({
					  title: "Berhasil dihapus!",
					  text: "Data dan File Berhasil dihapus",
					  type: "success",
					});
	                // gettabel();
	                window.location.reload(true);
	            }
            });
		})
    }
</script>