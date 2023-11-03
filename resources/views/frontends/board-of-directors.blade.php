@extends('frontends.layout')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white" style="padding-bottom:0px">
        <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-dark banner-content " style="background-image:url(images/banner/swaraj_banner<?php echo rand(1,4);?>.jpg);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Board Of Directors & KMP</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="/">Home</a></li>
							<li>Board Of Directors & KMP</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
		<div class="content-block">
			<!-- Features -->
			<div class="section-full content-inner bg-gray">
				<div class="container">
					<div class="row">
						<?php
						$teams = $db->query("select * from teams order by order_at asc");
						foreach($teams->rows as $key => $team) {
						?>
						<div class="col-lg-4 col-md-6 col-sm-6 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
							<div class="dlab-box service-box-2">
								<div class="dlab-media radius-sm dlab-img-overlay1 dlab-img-effect rotate"> 
									<img src="images/team/<?php echo $team['picture'];?>" alt="<?php echo $team['name'];?>" style="max-height:300px">
								</div>
								<div class="dlab-info">
									<h4 class="title"><?php echo $team['name'];?></h4>
									<h6><?php echo $team['designation'];?></h6>
									<p style="text-align:justify"><?php echo substr($team['description'],0,200)."...";?></p>
									<p style="display:none" id="bio_<?php echo $key;?>"><?php echo $team['description'];?></p>
									<a href="javascript:void()" onclick="openModal('<?php echo $key;?>','<?php echo $team['name']?>')" class="site-button btnhover14">Read More</a>
									
								</div>
							</div>
						</div>
						<?php	
						}
						?>
						
						
					</div>
				</div>
			</div>
			<!-- Features End -->
		</div>
	</div>
	<!--END Content-->
<div class="modal fade" id="bioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bioModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="bioModalDescription"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
@section()
