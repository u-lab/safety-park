import { isString, randStr } from '~/src/utils/String'

describe('src/utils/Number', () => {
  describe('isString', () => {
    const testCases = [
      { message: '文字列のとき、trueか', arg: 'aaa', want: true },
      { message: '文字列のとき、trueか', arg: '123', want: true },
      { message: '空の文字列のとき、trueか', arg: '', want: true },
      { message: '数字のとき、falseか', arg: 123, want: false },
      { message: 'Booleanのとき、falseか', arg: true, want: false },
      { message: 'Objectのとき、falseか', arg: {}, want: false },
      { message: 'Objectのとき、falseか', arg: { name: 'hoge' }, want: false },
      { message: '配列のとき、falseか', arg: [], want: false },
      { message: '配列のとき、falseか', arg: ['hoge'], want: false },
      { message: 'nullのとき、falseか', arg: null, want: false },
      { message: 'undefinedのとき、falseか', arg: undefined, want: false },
    ]

    for (const testCase of testCases) {
      it(testCase.message, () => {
        expect(isString(testCase.arg)).toBe(testCase.want)
      })
    }
  })

  describe('randStr', () => {
    it('文字列型が返却される', () => {
      const actual = randStr()
      expect(isString(actual)).toBeTruthy()
    })
  })
})
