export const getPlayersDefaultData = () => {
    return [
        {
            name: null,
            win: 0,
            lastAction: null
        },
        {
            name: 'Computer',
            win: 0,
            lastAction: null
        }
    ]
}

export const getImages = () => {  // return paths of images  for vue elements
    return {
        paper: 'public/img/paper.png',
        rock: 'public/img/rock.png',
        scissors: 'public/img/scissors.png',
    }
}