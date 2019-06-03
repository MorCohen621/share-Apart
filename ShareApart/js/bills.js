const bills = [{ id: 1, title: "Pizza", description: "Eat Pizza", total: 100 }, { id: 2, title: "test", description: "test hummues", total: 100 }];
const users_billings = [{ billing_id: 1, userid: 1, amount: 50 }, { billing_id: 1, userid: 2, amount: 50 }];

let resDiv;

$(() => {
    resDiv = $('#cardsContainer');
    renderCards();
})

const renderCards = () => {
    let str = '';

    str = bills.map(bill => {
        const usersBillStr = users_billings.map(userBill => {
            if (userBill.billing_id === bill.id) {
                return (
                    `<div>
                        ${userBill.userid}: ${userBill.amount}
                    </div>`
                );              
            }
        });
        return (
            `<div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">${bill.title}</h5>
                    <p class="card-text">
                       Description: ${bill.description} <br/>
                       Total: ${bill.total} <br/>
                       participants:
                       ${usersBillStr}                
                    </p>
                </div>
              </div>`
        );


    });
    resDiv.html(str);
}