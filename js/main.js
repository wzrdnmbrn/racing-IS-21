async function getPow(num = 1, pow = 1) {
    const req = await fetch(`?value=${num}&pow=${pow}`);
    return req;
}

const req = getPow();