const firebaseConfig = {

    apiKey: "AIzaSyCAd0YU4gLVEojt5ZeYNHJpYrGmFGwJJ2g",

    authDomain: "login-firebase-6a51b.firebaseapp.com",

    projectId: "login-firebase-6a51b",

    storageBucket: "login-firebase-6a51b.appspot.com",

    messagingSenderId: "449652526308",

    appId: "1:449652526308:web:d414460daccc45053870f1"

  };


  // Initialize Firebase

  const app = initializeApp(firebaseConfig);

  const auth = firebaase.auth()
  const database = firebase.database()

  function register () {
      email = document.getElementById('email').value
      password = document.getElementById('password').value
      full_name = document.getElementById('full_name').value
      any = document.getElementById('any').value
      if  ( validate_email(email) == false || validate_password(password) == false ){
        alert('Email or password is incorrect')  
        return

      }
      if (validate_field(fullname) == false || validate_field(any) == false){
         alert('One or more fields needs to be field')
         return 
      }
      //move on with auth
      auth.createUserWithEmailAndPassword(email, password)
      .then(function(){
          var user = auth.currentUser
          //Add this to the firebase datanase
          var database_ref = database.ref()
          //create user data
          var user_data = {
              email : email,
              full_name : full_name,
              any : any,
              last_login : Date.now()
          }
          database_ref.child('users/' + user.uid).set(user_data)

          alere('User Created!') 
      })
      .catch(function(error){
          var error_code = error.code
          var error_message = error.message
          alert(error_message)
      })
  }

  function validate_email(email){
    expression = /^[^@]+@\w+(\.\w+)+\w$/
     if(expression.test(email)== true){
         return true

     }else{
         return false
     }
  }

  function validate_password(password){
      if (password <6 ){
          return false
      }
      else{
          return true
      }
  }

  function validate_field(field) {
    if (field == null){
        return false
    }
    if(field.length <=0) {
        return false
    }  else {
        return true
    }
   }
