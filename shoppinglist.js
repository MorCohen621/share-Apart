//DIV TOGGLE
const toggleButton = document.querySelector('#toggleList');
const listDiv = document.querySelector('.list');

//User INPUT
const userInput = document.querySelector('.userInput');
const button = document.querySelector('button.description');
const p = document.querySelector('p.description');
let listItem = document.querySelectorAll('li');

//ADD ITEM
const addItemInput = document.querySelector('.addItemInput');
const addItemButton = document.querySelector('button.addItemButton');

//Remove Item
const removeItemButton = document.querySelector('button.removeItemButton');
  
//list items 
const listItems = document.getElementsByTagName('li');


button.addEventListener('click', () => {
  lastPickedColor = userInput.value;
  listItem = document.querySelectorAll('li');
   for(let i = 0; i < listItem.length; i++) {
    listItem[i].style.color = lastPickedColor;
    }
  p.innerHTML = 'The list colour is: ' + userInput.value;
});


addItemButton.addEventListener('click', () => {
  let list = document.querySelector('ul');
  let li = document.createElement('li');
  li.textContent = addItemInput.value;
  let appendedItem = list.appendChild(li);
  li.style.color = lastPickedColor; // so it will add li with last picked color
  for(let i = 0; i < appendedItem.length; i++) {
    appendedItem[i].style.color = lastPickedColor;
    } 
  addItemInput.value = '';
});



removeItemButton.addEventListener('click', () => {
  let list = document.querySelector('ul');
  let li = document.querySelector('li:last-child');
  list.removeChild(li);;
});


listDiv.addEventListener('mouseover', (event) => {
  if(event.target.tagName == 'LI') {
  event.target.style.textTransform = 'uppercase';
  }
});

listDiv.addEventListener('mouseout', (event) => {
  if(event.target.tagName == 'LI') {
  event.target.style.textTransform = 'lowercase';
  }
});

