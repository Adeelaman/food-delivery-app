<form id="paymentForm" style="display: none;">
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" id="email-address" required value="<?php echo e($_GET['email']); ?>" />
  </div>
  <div class="form-group">
    <label for="amount">Amount</label>
    <input type="tel" id="amount" required value="<?php echo e($_GET['amount']); ?>"/>
  </div>
  <div class="form-group">
    <label for="first-name">First Name</label>
    <input type="text" id="first-name" value="<?php echo e($_GET['name']); ?>"/>
  </div>
  <div class="form-group">
    <label for="last-name">Last Name</label>
    <input type="text" id="last-name" />
  </div>
  <div class="form-submit">
    <button type="submit" onclick="payWithPaystack()" id="py"> Pay </button>
  </div>
</form>
<script src="https://js.paystack.co/v1/inline.js"></script> 

<script>

window.onload = function(){
  document.getElementById('py').click();

}

const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: '<?php echo e($api); ?>', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      
    window.location="<?php echo e(Asset('api/payStackCancel')); ?>";

    },
    callback: function(response){
      
      window.location="<?php echo e(Asset('api/payStackSuccess')); ?>";
    }
  });
  handler.openIframe();
}
</script><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pos/local/resources/views/payStack.blade.php ENDPATH**/ ?>