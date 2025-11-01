
function generateTaxTable() {
    const brackets = [
        // {RANGE,      RANGE,          DEDUCTION,      DEDUCTION * RATE}
        { start: 0,      end: 10417,      base: 0,       rate: 0.00 },
        { start: 10417,  end: 16666,      base: 0,       rate: 0.20 },
        { start: 16667,  end: 33332,      base: 1250,    rate: 0.25 },
        { start: 33333,  end: 83332,      base: 5416.67, rate: 0.30 },
        { start: 83333,  end: 333332,     base: 20416.67,rate: 0.32 },
        { start: 333333, end: 999999999,  base: 100416.67,rate: 0.35 }
    ];

    // we can encode rules instead of typing raw values.
    // return brackets.map(b => [b.start, b.end, b.base, b.rate, b.start]);
    return brackets;
}

function computeIncomeTax(e_salary, e_taxTable){
    let subtotal = 0;

    // determine range
    e_taxTable.forEach(iii => {

        // if within range, do process
        if (Number(iii["start"]) <= Number(e_salary)    &&  Number(e_salary) <= Number(iii["end"])){

            subtotal = // base + rate * (e_salary - start)
                Number(iii["base"]) + 
                Number(iii["rate"]) * (Number(e_salary) - Number(iii["start"]));
        }
    });

    // should be 3583.25
    return subtotal;
}


const table = generateTaxTable();
console.log("computed tax: ");
console.log(computeIncomeTax(26000, table));

