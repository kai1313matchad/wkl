					
						<div class="row">
							<div class="col-lg-12">
								<!--begin::Portlet-->
								<div class="m-portlet" id="m_portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon">
													<i class="flaticon-map-location"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Event Calendar
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item">
													<a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
														<span>
															<i class="la la-plus"></i>
															<span>
																Add Event
															</span>
														</span>
													</a>
												</li>
												
											</ul>
										</div>
									</div>
									<div class="m-portlet__body">
										<div id="m_calendar"></div>
									</div>
								</div>
								<!--end::Portlet-->
							</div>
						</div>
			

<!--begin::Page Vendors -->
		<script src="<?php echo base_url();?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<!--end::Page Vendors -->  
        <!--begin::Page Resources -->
		<!-- <script src="<?php echo base_url();?>assets/demo/default/custom/components/calendar/basic.js" type="text/javascript"></script> -->
		<!--end::Page Resources -->



<script>
var todayDate = moment().startOf('day');
var YM = todayDate.format('YYYY-MM');
var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
var TODAY = todayDate.format('YYYY-MM-DD');
var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');	
$('#m_calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
    },
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    navLinks: true,
    events: '<?= base_url("calendar/test") ?>',

    eventRender: function(event, element) {
        if (element.hasClass('fc-day-grid-event')) {
            element.data('content', event.description);
            element.data('placement', 'top');
            mApp.initPopover(element); 
        } else if (element.hasClass('fc-time-grid-event')) {
            element.find('.fc-title').append('<div class="fc-description">' + event.description + '</div>'); 
        } else if (element.find('.fc-list-item-title').lenght !== 0) {
            element.find('.fc-list-item-title').append('<div class="fc-description">' + event.description + '</div>'); 
        }
    }
});	
		
	
</script>			