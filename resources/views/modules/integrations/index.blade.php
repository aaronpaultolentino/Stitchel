@extends('layouts.app')

@section('content')
   <div class="row mt--7">
      <div class="col">
         <div class="card shadow">
            <div class="card-body">
               @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <strong>Success!</strong> Integration has been saved!
                </div>
                @endif
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
                        <br>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                          @if(count($gmailIntegrations) == 0)
                          <a type="button" class="btn btn-primary btn-lg btn-block add-gmailIntegration" href="{{ $gmailIntegrationUrl }}" target="_blank"><i class="fas fa-plus"></i> Add
                           </a>
                          @else
                           @foreach($gmailIntegrations as $key => $gmailIntegration)
                            <div class="accordion-body">Gmail Account ({{ json_decode($gmailIntegration->data)->email }})<a type="button" class="btn btn-danger btn-sm float-right delete-integration" delete-url="{{ route('gmail.revokeToken', $gmailIntegration->id) }}" href="#" name="id" style="margin-bottom: 15px; "><i class="fas fa-times"></i> Delete</a>
                           </div><br>
   
                           @endforeach
                           @endif
                        </div>
                     </div>
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree"><i class="far fa-diamond"style="margin-right: 5px;"></i>JIRA
                           </button>
                        </h2>
                        <br>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                           @if(count($jiraIntegrations) == 0)
                          <a type="button" class="btn btn-primary btn-lg btn-block add-jiraIntegration" href="{{ $jiraIntegrationUrl }}" target="_blank"><i class="fas fa-plus"></i> Add
                           </a>
                          @else
                           @foreach($jiraIntegrations as $key => $jiraIntegration)
                            <div class="accordion-body">Jira Account ({{ json_decode($jiraIntegration->data)->email }})<a type="button" class="btn btn-danger btn-sm float-right delete-integration" delete-url="{{ route('jira.revokeToken', $jiraIntegration->id) }}" href="#" name="id" style="margin-bottom: 15px; "><i class="fas fa-times"></i> Delete</a>
                           </div><br>
                              
                           @endforeach
                           @endif
                        </div>
                     </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"><i class="fa fa-slack" aria-hidden="true" style="margin-right: 5px;"></i>SLACK
                           </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                           <div class="accordion-body">
                              Slack Account 1<button type="button" class="btn btn-danger float-right" style="margin-bottom: 15px;"><i class="fas fa-times"></i> Delete</button>
                           </div>
                           <button type="button" class="btn btn-primary btn-lg btn-block"><i class="fas fa-plus"></i> Add
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

@push('scripts')
   <script type="text/javascript">
     $(document).ready(function(){
      $('.delete-integration').click(function(e){
        e.preventDefault();
        let delete_url = $(this).attr('delete-url');
        var delete_confirm = confirm("Are you sure you want to delete this integration?");
        if(delete_confirm){
          $.ajax({
                'url'    : delete_url,
                'method' : 'POST',
                'data'   : {
                    '_token' : token()
                }
            })
            .done(function(){
              window.location.reload(true);
            });
        }
      });
     })
   </script>
@endpush
