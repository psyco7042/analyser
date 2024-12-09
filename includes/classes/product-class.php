<?php


class Analyser_product_class {
    public static function anal_get_best_seller_products($limit, $days) {
        $args = [
            'status' => ['completed', 'processing'], // Include completed and processing orders
            'date_after' => date('Y-m-d', strtotime("-{$days} days")), // Dynamically set the date range
            'return' => 'ids', // Return only the order IDs
        ];

        $orders = wc_get_orders($args);

        $product_sales = [];

        foreach ($orders as $order_id) {
            $order = wc_get_order($order_id);
            foreach ($order->get_items() as $item) {
                $product_id = $item->get_product_id();
                $qty = $item->get_quantity();

                if (!isset($product_sales[$product_id])) {
                    $product_sales[$product_id] = 0;
                }
                $product_sales[$product_id] += $qty;
            }
        }

        // Sort products by sales quantity
        arsort($product_sales);

        // Fetch top products
        $top_products = array_slice($product_sales, 0, $limit, true);

        $chart_data = [];
        foreach ($top_products as $product_id => $total_sold) {
            $product = wc_get_product($product_id);
            $chart_data[] = [
                'name' => $product->get_name(),
                'sales' => $total_sold
            ];
        }

        return json_encode($chart_data);
    }
}
