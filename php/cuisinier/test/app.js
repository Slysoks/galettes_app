// Initialize the "viande" variables
const viandeInput = document.getElementById('viandeInput');
const viandeSubmit = document.getElementById('viandeSubmit');
const viandeList = document.getElementById('viandeList');
const viandeOutput = document.getElementById('viandeOutput');

// Initialize the "fromage" variables
const fromageInput = document.getElementById('fromageInput');
const fromageSubmit = document.getElementById('fromageSubmit');
const fromageList = document.getElementById('fromageList');
const fromageOutput = document.getElementById('fromageOutput');

// When the window load, display the tags using the output line
window.onload = function() {
  console.info('Starting to display tags');
  try {
    console.log('Displaying viande tags')
    addTag(viandeInput, viandeList, viandeOutput);

    console.log('Displaying fromage tags')
    addTag(fromageInput, fromageList, fromageOutput);
  } catch (error) {
    console.error('Error:', error);
  }
  console.info('Finished displaying tags');
}

viandeInput.addEventListener('keyup', function(event) {
  if (event.key === 'Enter') {
    event.preventDefault();
    viandeSubmit.click();
  }
});

viandeSubmit.addEventListener('click', function() {
  addTag(viandeInput, viandeList, viandeOutput);
});

fromageInput.addEventListener('keyup', function(event) {
  if (event.key === 'Enter') {
    event.preventDefault();
    fromageSubmit.click();
  }
});

fromageSubmit.addEventListener('click', function() {
  console.log('Adding fromage tag');
  addTag(fromageInput, fromageList, fromageOutput);
});