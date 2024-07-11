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
window.addEventListener('load', function() {
  updateTags(viandeList, viandeOutput);
  updateTags(fromageList, fromageOutput);
});

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
  addTag(fromageInput, fromageList, fromageOutput);
});

function readOutputTags(output) {
  let tags = [];
  let out = output.textContent;
  out = out.split(';');
  if (out[0] === '') return [];
  return out;
}

function addTag(input, tagHolder, output) {
  // Get the tag from the input
  let tag = input.value;
  tag = tag.trim();

  // If the tag is empty, do nothing
  if (tag === '') return;

  // Read the tags and store them in a list
  let list = readOutputTags(output);

  // Add the new tag to the list
  list.push(tag);

  // Replace the old output with the new one
  output.textContent = list.join(';');
  input.value = '';
  updateTags(tagHolder, output);
} 

function createTagElement(tag, tagHolder, tagOutput) {
  let tagElement = document.createElement('div');
  tagElement.classList.add('tag');

  let text = document.createElement('p');
  text.textContent = tag;
  
  let button = document.createElement('button');
  button.textContent = 'X';
  button.classList.add('delete');
  button.addEventListener('click', function() {
    let tags = readOutputTags(tagOutput);
    let index = tags.indexOf(tag);
    tags.splice(index, 1);
    tagOutput.textContent = tags.join(';');
    updateTags(tagHolder, tagOutput);
  });

  tagElement.appendChild(text);
  tagElement.appendChild(button);

  return tagElement;
}

function updateTags(tagHolder, tagOutput) {
  // Clear the tag holder
  tagHolder.innerHTML = '';
  
  // If there are no tags in the output, do nothing
  if (tagOutput.textContent.trim() === '') return;

  // Main function to create the tags
  let tags = readOutputTags(tagOutput);
  tags.forEach(tag => {
    let tagElement = createTagElement(tag, tagHolder, tagOutput);
    tagHolder.appendChild(tagElement);
  });
}
