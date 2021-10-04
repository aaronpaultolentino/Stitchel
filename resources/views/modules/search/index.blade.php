<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />
    <link href="{{ url('css/main.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ url('css/main.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('argon/assets/css/argon-dashboard.min.css') }}">
    <script src="https://kit.fontawesome.com/2a3479ee76.js" crossorigin="anonymous"></script>

    <style type="text/css">
      #global-search-result{
          background-color: #FFF;
          border-bottom-left-radius: 10px;
          border-bottom-right-radius: 10px;
          box-shadow: 0 10px 10px rgba(0,0,0,.1);
          width: 100%
      }

      #global-search-result table tr.global-search-result-item:hover{
          background-color: rgb(241 241 241 / 87%);
      }

      #global-search-result table tr.global-search-result-item{
          cursor: pointer;
      }

      #global-search-cancel{
          cursor: pointer;
      }

      .navbar-search .form-control {
          width: 350px;
          background-color: transparent;
      }

      .navbar-search .input-group {
          border-radius: 50px;
          border: 2px solid;
          background-color: rgb(255 255 255 / 87%);
          border-color: rgba(255, 255, 255, 0.6);
      }

      .navbar-search-active{
          /*border-radius: 10px 10px 0px 0px;*/
          background-color: #FFF !important;
      }

      .navbar-search-searching{
          border-radius: 10px 10px 0px 0px !important;
      }

      .list-rows{
        padding: 1rem;
        vertical-align: top;
        border-top: 1px solid #e9ecef;
        vertical-align: middle;
      }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('') }}">
  </head>
  <body>
        <div class="content container">
            <div class="s003"> 
              <form>
                <h1>Stitchel</h1>
                <div class="inner-form mt-5">
                  <div class="input-field first-wrap">
                    <div class="input-select">
                      <select data-trigger="" name="choices-single-defaul">
                        <option placeholder="">Category</option>
                        <option>All</option>
                        <option>Jira</option>
                        <option>Gmail</option>
                        <option>Slack</option>
                        <option>Facebook</option>
                      </select>
                    </div>
                  </div>
                  <div id="global-search-container" style="width: 80%;">
                    <div class="input-field second-wrap">
                      <input class="gcse-search" id="search" type="text" placeholder="Enter Keywords" />
                    </div>
                  
                    
                  </div>
                  <div class="input-field third-wrap">
                    <button class="btn-search" type="button">
                      <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="tab-pane tab-example-result fade show active d-none" role="tabpanel" aria-labelledby="table-component-tab" id="global-search-result">
                    <div class="table-responsive">
                      <div>
                        <div class="table align-items-center">
                          
                          <div id="search-list-body" style="overflow: hidden;">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{url('js/extension/choices.js')}}"></script>
    <script async src="https://cse.google.com/cse.js?cx=b74fbed8e135246af"></script>
    <script type="text/javascript" src="{{ url('js/global.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/Foundation/Search.js') }}"></script>
    <script>
      $(document).ready(function(){
        const choices = new Choices('[data-trigger]',
        {
          searchEnabled: false,
          itemSelectText: '',
        });
      })

    </script>
  </body>
</html>
