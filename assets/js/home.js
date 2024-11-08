const product = [
    {
        id: 0,
        image: 'https://in-exstatic-vivofs.vivo.com/gdHFRinHEMrj3yPG/1696919264819/883afd607c31d38d4b0702d700286be7.png',
        title: 'Vivo V29',
        price: "8500",
    },
    {
        id: 1,
        image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVQkBCf40Kq_PEogflqdAQ-3YVLern_k4FVA&usqp=CAU',
        title: 'DELL 3530',
        price: "15000",
    },
    {
        id: 2,
        image: 'https://thumbs.dreamstime.com/b/pair-brown-men-shoes-isolated-white-studio-background-196868516.jpg',
        title: 'FORTIVA stylish shoes',
        price: "450",
    },
    {
        id: 3,
        image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpc_5orm2j_vIj4khPatHUgbJ-8sjpcbfijQ&usqp=CAU',
        title: 'SONY braviya 43',
        price: "20,000",
    },
    {
        id: 4,
        image: 'data:image/jpeg;base64,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',
        title: 'activa 5g scooty',
        price: "23000",
    },
    {
        id: 5,
        image: 'https://s0.hfdstatic.com/sites/infographics/images/vin/silver-car.jpg',
        title: 'Hyundai 5024 car',
        price: "75000",
    },
];

const categories = [...new Set(product.map((item) => { return item }))]

document.getElementById('searchBar').addEventListener('keyup', (e) => {
    const searchData = e.target.value.toLowerCase();
    const filteredData = categories.filter((item) => {
        return (
            item.title.toLowerCase().includes(searchData)
        )
    })
    displayItem(filteredData)
});

const displayItem = (items) => {
    document.getElementById('root').innerHTML = items.map((item) => {
        var { image, title, price } = item;
        return (
            `<div class='box'>
                <div class='img-box'>
                    <img class='images' src=${image}></img>
                </div> 
                <div class='bottom'>
                    <p>${title}</p>
                    <h2>$ ${price}.00</h2>
                <button>Participate</button>
                </div>
            </div>`
        )
    }).join('')
};
displayItem(categories);