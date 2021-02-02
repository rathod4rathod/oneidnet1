const stripe = Stripe('pk_test_51HqXE5IIelCwrUfqk4CcP1jdDNLl8dClBflwa2pyzTcYcsFTq3VTznk075nTuP9kbqtJrwKMgLJOv7bEAUwXZ709007J2nFdX3');
  const myForm = document.querySelector('.my-form');
  myForm.addEventListener('submit', handleForm);

  async function handleForm(event) {
    event.preventDefault();
    // var companyt = document.getElementById('.inp-company-type').value;
    const accountResult = await stripe.createToken('account', {
      business_type: 'individual',
      individual: {
        first_name: document.getElementById('First_Name').value,
        last_name: document.getElementById('Last_Name').value,
        id_number: document.getElementById('Id_No').value,
        email: document.getElementById('Email_Add').value, 
        // name: document.querySelector('.inp-company-name').value,
        // tax_id: document.querySelector('.inp-company-pan').value,
        // registration_number: document.querySelector('.inp-company-reg').value,
        address: {
          line1: document.getElementById('Address').value,
          city: document.getElementById('City').value,
          state: document.getElementById('State').value,
          postal_code: document.getElementById('Zip_Code').value,
        },
        dob: {
          day: document.getElementById('Day_Dob').value, 
          month: document.getElementById('Month_Dob').value, 
          year: document.getElementById('Year_Dob').value, 
        },
        // cross_border_transaction_types: 'domestic', 
      },
      tos_shown_and_accepted: true,
    });

    // const bankResult = await stripe.createToken('bank_account', {
    //   bank_account: {
    //     country: 'IN',
    //     currency: 'inr',
    //     account_holder_name: 'Chetan Nolkha',
    //     account_holder_type: 'individual',
    //     ifsc_code: 'HDFC0004051',
    //     account_number: '000123456789',
    //   },
    // });
    // const personResult = await stripe.createToken('person', {
    //   person: {
    //     relationship: {
    //       representative: true,
    //     },
    //     first_name: document.querySelector('.inp-person-first-name').value,
    //     last_name: document.querySelector('.inp-person-last-name').value,
    //     address: {
    //       line1: document.querySelector('.inp-person-street-address1').value,
    //       city: document.querySelector('.inp-person-city').value,
    //       state: document.querySelector('.inp-person-state').value,
    //       postal_code: document.querySelector('.inp-person-zip').value,
    //     },
    //     id_number: document.querySelector('.inp-person-id-number').value,
    //     dob: {
    //       day: document.querySelector('.inp-person-day').value, 
    //       month: document.querySelector('.inp-person-month').value, 
    //       year: document.querySelector('.inp-person-year').value, 
    //     },
    //   },
    // });

    if (accountResult.token) {
      document.getElementById('token-account').value = accountResult.token.id;
      // document.querySelector('#token-person').value = bankResult.token.id;
      myForm.submit();
    }
  }