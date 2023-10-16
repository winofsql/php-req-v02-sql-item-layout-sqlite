<?php
// ***********************************
// 画面用テーブル要素文字列作成
// ***********************************
function get_table($statement) {

    $html = "";
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $html .= "<tr>\n";
        $html .= "\t<td>{$row["社員コード"]}</td>\n";
        $html .= "\t<td>{$row["氏名"]}</td>\n";
        $html .= "\t<td>{$row["フリガナ"]}</td>\n";
        $html .= "\t<td>{$row["所属"]}</td>\n";
        if ( $row["性別"]  == "男性" ) {
            $html .= "\t<td class=\"text-primary\">{$row["性別"]}</td>\n";
        }
        else {
            $html .= "\t<td class=\"text-danger\">{$row["性別"]}</td>\n";
        }
        $val = number_format($row["給与"]+0);
        $html .= "\t<td class=\"text-end\">{$val}</td>\n";
        if ( $row["手当"] == "" ) {
            $html .= "\t<td class=\"text-end\">{$row["手当"]}</td>\n";
        }
        else {
            $val = number_format($row["手当"]+0);
            $html .= "\t<td class=\"text-end\">{$val}</td>\n";
        }
        $html .= "\t<td>{$row["管理者"]}</td>\n";
        $html .= "\t<td>{$row["生年月日"]}</td>\n";
        $html .= "</tr>\n";
    }

    return $html;

}