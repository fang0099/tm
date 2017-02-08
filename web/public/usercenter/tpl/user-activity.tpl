<div class="m">
	<section class="wrapper">
	    <div class="user-detail  list-page clear">
	        <h1 class="title">相关动态 </h1>

	        <div class="user-articles-list  tc">
	        	<div class="user-state">

		            <div class="top-circle">
					    <div class="circle-b">
					        <span class="circle-c">
							</span>
					    </div>
					</div>

			         <ul class="state-list">
						 {{#data}}
					    <li>
					        <div class="l-cont">
					            <time>{{publish_time}}</time>
					            <span class="point"></span>
					        </div>
					        <div class="r-cont">
					            <div class="inner">
					                <h2 class="head-line show-left">{{title}}</h2>
					                <h3 class="title show-left">
										<a href="{{reflink}}" target="_blank">{{reft }}
										</a>
									</h3>
					                <p class="intro show-left">{{refat}}</p>
					            </div>
					        </div>
					    </li>
					    {{/data}}
					</ul>

                   <style type="text/css" media="screen">
	                  .list-page{
	                      min-height: initial !important;
	                }
	              </style>
		            <div class="load-more-state tc">
		              <button class="btn btn-normal gray btn-bordered">查看更多</button>
		            </div>
                  </div>
			    
			</div>

	    </div>

	</section>
</div>
<input type="hidden" name="page" value="1">