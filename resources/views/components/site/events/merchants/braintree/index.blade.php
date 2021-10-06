<script src="https://js.braintreegateway.com/web/3.67.0/js/client.min.js" SameSite=None></script>
<script src="https://js.braintreegateway.com/web/3.67.0/js/hosted-fields.min.js" SameSite=None></script>
<style type="text/css">
  #cc_number_braintree, #cvv_braintree, #cc_expiration_braintree{
    display: block;
    width: 100%;
    height: calc(2.75rem + 2px);
    padding: 0.625rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #cad1d7;
    border-radius: 0.375rem;
    box-shadow: none;
    transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }
</style>
<script type="text/javascript">
	// var form = $('form');
$('#cc_number_container').append($('<div id="cc_number_braintree"></div>'));
$('#cc_cvv_container').append($('<div id="cvv_braintree"></div>'));
$('#cc_exp_container').append($(' <div class="col-sm-8"><div id="cc_expiration_braintree"></div></div>'));

//hide original inputs

$('#cc_exp_month_container, #cc_exp_year_container, [name="cc_number"], [name="cc_cvv"]').hide()
braintree.client.create({
  authorization: '{{ $brainTreeToken }}'
}, function(err, clientInstance) {
  if (err) {
    console.error(err);
    return;
  }
  braintree.hostedFields.create({
    client: clientInstance,
    styles: {
      'input': {
        // change input styles to match
        // bootstrap styles
        'font-size': '1rem',
        'color': '#8898aa',
      },
    },
    fields: {
      number: {
        selector: '#cc_number_braintree',
        // placeholder: '4111 1111 1111 1111',
      },
      cvv: {
        selector: '#cvv_braintree',
        // placeholder: '123'
      },
      expirationDate: {
        selector: '#cc_expiration_braintree',
        // placeholder: 'MM / YY'
      }
    }
  }, function(err, hostedFieldsInstance) {
  	console.log('hostedFieldsInstance', hostedFieldsInstance)
    if (err) {
      console.error(err);
      return;
    }
    function createInputChangeEventListener(element) {
      return function () {
        validateInput(element);
      }
    }

    function setValidityClasses(element, validity) {
      if (validity) {
        element.removeClass('is-invalid');
        element.addClass('is-valid');  
      } else {
        element.addClass('is-invalid');
        element.removeClass('is-valid');  
      }    
    }
    
    function validateInput(element) {
      // very basic validation, if the
      // fields are empty, mark them
      // as invalid, if not, mark them
      // as valid

      if (!element.val().trim()) {
        setValidityClasses(element, false);

        return false;
      }

      setValidityClasses(element, true);

      return true;
    }

    $('#checkoutButton').unbind();
    
    $('#checkoutButton').click(function(){
      var formIsInvalid = false;
      var state = hostedFieldsInstance.getState();


      // Loop through the Hosted Fields and check
      // for validity, apply the is-invalid class
      // to the field container if invalid
      // Object.keys(state.fields).forEach(function(field) {
      //   if (!state.fields[field].isValid) {
      //     $(state.fields[field].container).addClass('is-invalid');
      //     formIsInvalid = true;
      //   }
      // });

      // if (formIsInvalid) {
        // skip tokenization request if any fields are invalid
      //   return;
      // }
      $('body').loading();
      hostedFieldsInstance.tokenize(function(err, payload) {
        if (err) {
          console.error(err);
          snackAlert(err.message, 'danger', 'Error!')
          $('body').loading('stop');
          return;
        }

        // This is where you would submit payload.nonce to your server
        // $('.toast').toast('show');

        // you can either send the form values with the payment
        // method nonce via an ajax request to your server,
        // or add the payment method nonce to a hidden inpiut
        // on your form and submit the form programatically
        // $('#payment-method-nonce').val(payload.nonce);
        console.log('nonce', payload.nonce)
        Registration.checkoutFunction(function(data){
          window.location.href = url(Event.data.slug+'/confirmation/'+data.registration_checkout_details.transaction_id);
        }, {'nonce': payload.nonce});
        // form.submit()
      });
      
    });
  });
});
</script>