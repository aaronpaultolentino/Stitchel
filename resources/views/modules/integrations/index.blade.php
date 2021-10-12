@extends('layouts.app')

@section('content')
   <div class="row mt--7">
      <div class="col">
         <div class="card shadow">
            <div class="card-body">
               <h1>Integrations</h1>
               <div class="col-lg-6">
               <div class="input-group rounded">
                 <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                   aria-describedby="search-addon" />
                 <span class="input-group-text border-0" id="search-addon">
                   <i class="fas fa-search"></i>
                 </span>
               </div>
            </div>
            <br><br>
               <div class="accordion accordion-flush" id="accordionFlushExample">
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"><i class="fab fa-google" style="margin-right: 5px;"></i>GMAIL
                           </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                           <div class="accordion-body">Gmail Account 1<button type="button" class="btn btn-danger float-right" style="margin-bottom: 15px; "><i class="fal fa-trash-alt"></i> Delete</button>
                           </div>
                           <button type="button" class="btn btn-primary btn-lg btn-block"><i class="fal fa-plus-square"></i> Add
                           </button>
                        </div>
                     </div>
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"><i class="fa fa-slack" aria-hidden="true" style="margin-right: 5px;"></i>SLACKS
                           </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                           <div class="accordion-body">
                              Slack Account 1<button type="button" class="btn btn-danger float-right" style="margin-bottom: 15px;"><i class="fal fa-trash-alt"></i> Delete</button>
                           </div>
                           <button type="button" class="btn btn-primary btn-lg btn-block"><i class="fal fa-plus-square"></i> Add
                           </button>
                        </div>
                     </div>
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree"><i class="far fa-diamond"style="margin-right: 5px;"></i>JIRA
                           </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                           <div class="accordion-body">
                              Jira Account 1<button type="button" class="btn btn-danger float-right" style="margin-bottom: 15px;"><i class="fal fa-trash-alt"></i> Delete</button>
                           </div>
                           <button type="button" class="btn btn-primary btn-lg btn-block"><i class="fal fa-plus-square"></i> Add
                           </button>
                        </div>
                     </div>
                  </div>
               <hr />
            </div>
         </div>
      </div>
   </div>
@endsection
