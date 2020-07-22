/**
 * 文字列型か
 *
 * @param {any} v
 * @return {boolean}
 */
export const isString = v => typeof v === 'string'

/**
 * ランダムな文字列を取得
 */
export const randStr = () => Math.random().toString(32).substring(2)
