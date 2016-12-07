/**
 * Accept delete a point
 * @param  Object objButton []
 * @return boolean
 */
function messageDeletePoint(objButton){  
    return confirm(objButton.value);
};
/**
 * Logout
 * @return void
 */
function logout(){
    event.preventDefault();
    document.getElementById('logout-form').submit();
};
