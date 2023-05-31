// PAGE EDIT
if ($('#edit')[0])
{
  function validateEmail(email) {
    let re = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/
    return re.test(String(email).toLowerCase());
  }

  $('form').submit(function()
{
    let errors = [],
        msg = ''

    $('.form-control.req').each(function()
    {
      let val = $(this).val(),
          name = $(this).attr('name')

      if (name == 'email' && val) {
        if (!validateEmail($('#email').val())) {
          errors.push('email - не валиден')
        }
      }
      else {
        if (!val) {
          errors.push(name+' - необходимо заполнить')
        }
      }
    })

    errors.map(error => {
      msg += error ? "\n" : ''
      msg += error
    })

    if (msg) {
      alert(msg)
      return false
    }
      
  })
}