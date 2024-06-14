    function Calculate() {
        let amount = parseFloat(document.getElementById('amount').value);
        let rate = parseFloat(document.getElementById('rate').value);
        let time = parseFloat(document.getElementById('time').value);

        if (!isNaN(amount) && !isNaN(rate) && !isNaN(time)) {
            const interest = (amount * (rate * 0.01)) / time;
            let emi = ((amount / time) + interest).toFixed(2);
            emi = emi.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("output").value=emi;
        } 
    }
    
      function Emi(){
        let total = parseFloat(document.getElementById('total').value);
        let downPayment = parseFloat(document.getElementById('downpayment').value);
        let installment = parseFloat(document.getElementById('installment').value);

        let emi = (total - downPayment) / installment;
        emi = emi.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        document.getElementById("output").value = emi;
    }