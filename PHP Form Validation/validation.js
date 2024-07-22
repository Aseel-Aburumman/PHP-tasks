function validateEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email) && email !== "";
  }
  
  function validateMobile(mobile) {
    const mobilePattern = /^\d{10}$/;
    return mobilePattern.test(mobile) && mobile !== "";
  }
  
  function validateFullName(fullName) {
    const namePattern = /^[a-zA-Z]+$/;
    const sections = fullName.trim().split(/\s+/);
    if (sections.length !== 4) {
      return false;
    }
    return sections.every(name => namePattern.test(name) && name !== "");
  }
  
  function validatePassword(password) {
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return passwordPattern.test(password) && password !== "";
  }
  
  function validatePasswordConfirmation(password, confirmPassword) {
    return password === confirmPassword && confirmPassword !== "";
  }
  
  function validateForm(event) {
    event.preventDefault();
  
    const form = document.getElementById('myForm');
    const email = form.email.value;
    const mobile = form.mobile.value;
    const fullName = form.Full_name.value;
    const password = form.password.value;
    const confirmPassword = form.confirm_password.value;
  
    if (!validateEmail(email)) {
      alert("Invalid email");
      return false;
    }
  
    if (!validateMobile(mobile)) {
      alert("Invalid mobile number");
      return false;
    }
  
    if (!validateFullName(fullName)) {
      alert("Invalid full name");
      return false;
    }
  
    if (!validatePassword(password)) {
      alert("Invalid password");
      return false;
    }
  
    if (!validatePasswordConfirmation(password, confirmPassword)) {
      alert("Passwords do not match");
      return false;
    }
  
    alert("All inputs are valid!");
    form.submit();
    return true;
  }
  
  document.getElementById('myForm').addEventListener('submit', validateForm);
  