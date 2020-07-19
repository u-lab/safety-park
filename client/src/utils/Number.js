/**
 * ランダム関数
 *
 * ランダムな整数を取得する
 *
 * @param {Number} min 最小値
 * @param {Number} max 最大値
 * @returns {Number}
 */
export const randInteger = (min, max) => Math.floor(Math.random() * (max + 1 - min)) + min
