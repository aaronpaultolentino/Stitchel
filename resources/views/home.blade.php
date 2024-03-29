@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="content container">
            <div class="s003"> 
              <form>
                <h1>Search</h1>
                <div class="inner-form">
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
                  <div class="input-field second-wrap">
                    <input class="gcse-search" id="search" type="text" placeholder="Enter Keywords?" />
                  </div>
                  <div class="input-field third-wrap">
                    <button class="btn-search" type="button">
                      <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </form>
            </div>
        </div>
    <script src="js/extention/choices.js"></script>
    <script async src="https://cse.google.com/cse.js?cx=b74fbed8e135246af"></script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
