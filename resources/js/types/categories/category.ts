import { SubCategory } from "./subCategory";

export interface Category {
    id: number;
    name: string;
    description?: string;
    sub_categories?: SubCategory[];
    created_at: string;
    updated_at: string;
}
