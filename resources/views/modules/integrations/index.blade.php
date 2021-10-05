<!DOCTYPE html>
<script src="https://use.fontawesome.com/87500529be.js"></script>
<html>
<head>
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
   @include('layouts.navigation.admin.admin')
   <div class="container-fluid">
   <h1>Integrations</h1>
   <div class="row mt--2">
   <div id="page-content-wrapper">
      <div class="col-lg-6">
         <div class="input-group rounded" style="margin-bottom: 30px;">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
               aria-describedby="search-addon" />
         </div>
      </div>
   </div>
   <div class="col">
   <div class="card shadow">
      <div class="card-body">
         <div class="pl-lg-12">
            <div class="row">
               <div class="col-lg-12">
                  <div class="accordion accordion-flush" id="accordionFlushExample">
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                           GMAIL
                           </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                           <div class="accordion-body">Gmail Account 1.<button type="button" class="btn btn-danger pull-right" style="margin-bottom: 15px;"><i class="bi bi-x-circle"></i> Delete</button>
                           </div>
                           <button type="button" class="btn btn-primary btn-lg btn-block"><i class="bi bi-plus-circle"></i> Add
                           </button>
                        </div>
                     </div>
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"><i class="fa fa-slack" aria-hidden="true"></i>
                           SLACKS
                           </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                           <div class="accordion-body">
                              Slack Account 1.<<button type="button" class="btn btn-danger pull-right" style="margin-bottom: 15px;"><i class="bi bi-x-circle"></i> Delete</button>
                           </div>
                           <button type="button" class="btn btn-primary btn-lg btn-block"><i class="bi bi-plus-circle"></i> Add
                           </button>
                        </div>
                     </div>
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                           JIRA
                           </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                           <div class="accordion-body">
                              Jira Account 1.<button type="button" class="btn btn-danger pull-right" style="margin-bottom: 15px;"><i class="bi bi-x-circle"></i> Delete</button>
                           </div>
                           <button type="button" class="btn btn-primary btn-lg btn-block"><i class="bi bi-plus-circle"></i> Add
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <hr>
      </div>
   </div>
   <footer class="footer" style="padding-top: 450px;">
      <div class="row align-items-center justify-content-xl-between">
         <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
               © Copyright 2021, Stitchel, LLC. All rights reserved. 
            </div>
         </div>
      </div>
   </footer>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>