const stripe = Stripe('pk_test_51HqXE5IIelCwrUfqk4CcP1jdDNLl8dClBflwa2pyzTcYcsFTq3VTznk075nTuP9kbqtJrwKMgLJOv7bEAUwXZ709007J2nFdX3');
  

  const myForm = document.querySelector('.my-form');
  myForm.addEventListener('submit', handleForm);

  async function handleForm(event) {
    event.preventDefault();
    const data = new FormData();
    data.append('file', document.getElementById('Id_Front').files[0]);
    data.append('purpose', 'identity_document');
    const fileResult = await fetch('https://files.stripe.com/v1/files', {
      method: 'POST',
      headers: {'Authorization': 'Bearer pk_test_51HqXE5IIelCwrUfqk4CcP1jdDNLl8dClBflwa2pyzTcYcsFTq3VTznk075nTuP9kbqtJrwKMgLJOv7bEAUwXZ709007J2nFdX3'},
      body: data,
    });
    const fileData = await fileResult.json();

    const data1 = new FormData();
    data1.append('file', document.getElementById('Id_Back').files[0]);
    data1.append('purpose', 'identity_document');
    const fileResult1 = await fetch('https://files.stripe.com/v1/files', {
      method: 'POST',
      headers: {'Authorization': 'Bearer pk_test_51HqXE5IIelCwrUfqk4CcP1jdDNLl8dClBflwa2pyzTcYcsFTq3VTznk075nTuP9kbqtJrwKMgLJOv7bEAUwXZ709007J2nFdX3'},
      body: data1,
    });
    const fileData1 = await fileResult1.json();
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
        verification: {
          document: {
              back: fileData1.id,
              front: fileData.id,
              },
          },
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