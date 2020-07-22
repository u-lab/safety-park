import { randInteger } from '~/src/utils/Number'

describe('src/utils/Number', () => {
  describe('randInteger', () => {
    it('min = 0, max = 0のとき、0が返ってくるか', () => {
      expect(randInteger(0, 0)).toBe(0)
    })

    it('min = 0, max = 3のとき、0 ~ 3すべて取得できるか', () => {
      const result = [0, 0, 0, 0]
      let error = 0

      for (let i = 0; i < 1e6; i++) {
        const rand = randInteger(0, 3)
        if ([0, 1, 2, 3].includes(rand)) {
          result[rand]++
        } else {
          error++
        }
      }

      expect(result.every(num => num > 0)).toBeTruthy() // すべて 0 ~ 3の値は、1回は出現したか
      expect(error).toBe(0)
    })
  })
})
